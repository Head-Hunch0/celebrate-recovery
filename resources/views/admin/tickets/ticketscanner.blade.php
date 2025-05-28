<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ticket Scanner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>

</head>
<body class="bg-gray-100 min-h-screen p-4">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-indigo-600 p-4 text-white">
            <h1 class="text-xl font-bold">Celebrate Recovery Ticket Scanner</h1>
            <p class="text-indigo-200">Scan attendee tickets</p>
        </div>
        
        <div class="p-4">
            <div id="scanner-container" class="mb-4 border-2 border-dashed border-gray-300 rounded-lg overflow-hidden">
                <div id="interactive" class="w-full h-64 relative"></div>
            </div>
            
            <div id="result" class="hidden p-4 mb-4 rounded-lg">
                <div id="ticket-info" class="space-y-2"></div>
                <div id="verification-result" class="mt-4 p-3 rounded hidden"></div>
            </div>
            
            <div class="flex space-x-2">
                <button id="startButton" class="flex-1 bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                    Start Scanner
                </button>
                <button id="stopButton" class="flex-1 bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700" >
                    Stop Scanner
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startButton = document.getElementById('startButton');
            const stopButton = document.getElementById('stopButton');
            const resultContainer = document.getElementById('result');
            const ticketInfo = document.getElementById('ticket-info');
            const verificationResult = document.getElementById('verification-result');
    

            const html5QrCode = new Html5Qrcode("scanner-container");

    document.getElementById('startButton').addEventListener('click', () => {
        Html5Qrcode.getCameras().then(devices => {
            if (devices && devices.length) {
                // Try to find the back camera
                const backCamera = devices.find(device => device.label.toLowerCase().includes('back'))
                    || devices[0]; // fallback to first device if back camera isn't found

                const cameraId = backCamera.id;

                html5QrCode.start(
                    cameraId,
                    {
                        fps: 10,
                        qrbox: { width: 250, height: 250 }
                    },
                    qrCodeMessage => {
                        html5QrCode.stop();
                        verifyTicket(qrCodeMessage);
                    },
                    errorMessage => {
                        // Optional error handling
                    }
                );
            } else {
                alert("No cameras found.");
            }
        }).catch(err => {
            console.error("Camera initialization failed:", err);
        });

    });

    document.getElementById('stopButton').addEventListener('click', () => {
        html5QrCode.stop();
    });
            
            // Verify ticket with backend
            // async function verifyTicket(ticketNumber) {
            //     try {

            //         // Show loading state
            //         ticketInfo.innerHTML = `<p class="text-gray-600">Verifying ticket ${ticketNumber}...</p>`;
            //         resultContainer.classList.remove('hidden');
            //         verificationResult.classList.add('hidden');
                    
            //         // Call API to verify
            //         const response = await fetch('https://0df1-102-0-6-211.ngrok-free.app/admin/tickets/verify', {
            //             method: 'POST',
            //             headers: {
            //                 'Content-Type': 'application/json',
            //                 'Accept': 'application/json',
            //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //             },
            //             body: JSON.stringify({ ticket_number: ticketNumber })
            //         });
                    
            //         // alert('Ticket verification response: ' + response.status);
            //         const data = await response.json();
                    
            //         // Display results
            //         if (data.success) {
            //             // Get full ticket details
            //             const ticketResponse = await fetch(`/api/tickets/${ticketNumber}`);
            //             const ticketData = await ticketResponse.json();
                        
            //             ticketInfo.innerHTML = `
            //                 <h3 class="font-bold text-lg text-indigo-700">Ticket Verified</h3>
            //                 <p><span class="font-semibold">Number:</span> ${ticketData.number}</p>
            //                 <p><span class="font-semibold">Holder:</span> ${ticketData.holder_name || 'Not specified'}</p>
            //                 <p><span class="font-semibold">Type:</span> ${ticketData.type}</p>
            //                 <p><span class="font-semibold">Verified at:</span> ${new Date().toLocaleString()}</p>
            //             `;
                        
            //             verificationResult.innerHTML = '✅ Ticket successfully marked as used';
            //             verificationResult.className = 'mt-4 p-3 rounded bg-green-100 text-green-800';
            //         } else {
            //             ticketInfo.innerHTML = `
            //                 <h3 class="font-bold text-lg text-red-700">Verification Failed</h3>
            //                 <p><span class="font-semibold">Ticket:</span> ${ticketNumber}</p>
            //             `;
            //             verificationResult.innerHTML = `❌ ${data.message}`;
            //             verificationResult.className = 'mt-4 p-3 rounded bg-red-100 text-red-800';
            //         }
                    
            //         verificationResult.classList.remove('hidden');
                    
            //         // Restart scanner after 3 seconds
            //         setTimeout(() => {
            //             if (!scannerActive) {
            //                 Quagga.start();
            //                 scannerActive = true;
            //             }
            //         }, 3000);
                    
            //     } catch (error) {
            //         alert('Error verifying ticket. Please try again. ' + error);
            //         console.error('Verification error:', error);
            //         ticketInfo.innerHTML = '<p class="text-red-600">Error verifying ticket</p>';
            //         verificationResult.innerHTML = '❌ Network error. Please try again.';
            //         verificationResult.className = 'mt-4 p-3 rounded bg-red-100 text-red-800';
            //         verificationResult.classList.remove('hidden');
            //     }
            // }

            async function verifyTicket(ticketNumber) {
    try {
        // First parse the ticketNumber (which is actually your full JSON string)
        const ticketData = JSON.parse(ticketNumber);
        
        // Show loading state with the event name
        ticketInfo.innerHTML = `
            <div class="flex items-center space-x-2">
                <svg class="animate-spin h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Verifying ${ticketData.event} ticket...</span>
            </div>
        `;
        
        resultContainer.classList.remove('hidden');
        verificationResult.classList.add('hidden');
        
        // Call API to verify - using ticketData.ticketNumber as the actual number
        const response = await fetch('https://celebraterecoverykenya.org/admin/tickets/verify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ ticket_number: ticketData.ticketNumber })
        });
        
        const data = await response.json();
        
        if (data.success) {
            // Display all ticket details from the QR code
            ticketInfo.innerHTML = `
                <div class="space-y-3">
                    <h3 class="font-bold text-lg text-indigo-700">${ticketData.event}</h3>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="font-semibold text-sm text-gray-500">Ticket ID</p>
                            <p>${ticketData.ticketId}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-500">Ticket Number</p>
                            <p>${ticketData.ticketNumber}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="font-semibold text-sm text-gray-500">Date</p>
                            <p>${ticketData.date}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-500">Time</p>
                            <p>${ticketData.time}</p>
                        </div>
                    </div>
                    <div class="pt-2 border-t border-gray-200">
                        <p class="text-sm text-gray-500">Verified at</p>
                        <p>${new Date().toLocaleString()}</p>
                    </div>
                </div>
            `;
            
            verificationResult.innerHTML = '✅ Ticket successfully verified';
            verificationResult.className = 'mt-4 p-3 rounded bg-green-100 text-green-800';
        } else {
            ticketInfo.innerHTML = `
                <h3 class="font-bold text-lg text-red-700">Verification Failed</h3>
                <div class="space-y-2 mt-2">
                    <p><span class="font-semibold">Event:</span> ${ticketData.event}</p>
                    <p><span class="font-semibold">Ticket:</span> ${ticketData.ticketNumber}</p>
                </div>
            `;
            verificationResult.innerHTML = `❌ ${data.message}`;
            verificationResult.className = 'mt-4 p-3 rounded bg-red-100 text-red-800';
        }
        
        verificationResult.classList.remove('hidden');
        
        // Restart scanner after delay
        setTimeout(() => {
            html5QrCode.start(
                cameraId, 
                {
                    fps: 10,
                    qrbox: { width: 250, height: 250 }
                },
                qrCodeMessage => {
                    html5QrCode.stop();
                    verifyTicket(qrCodeMessage);
                },
                errorMessage => {}
            );
        }, 3000);
        
    } catch (error) {
        console.error('Verification error:', error);
        ticketInfo.innerHTML = `
            <div class="text-red-600">
                <h3 class="font-bold">Error Processing Ticket</h3>
                <p class="text-sm mt-1">${error.message}</p>
            </div>
        `;
        verificationResult.innerHTML = '❌ Please try scanning again';
        verificationResult.className = 'mt-4 p-3 rounded bg-red-100 text-red-800';
        verificationResult.classList.remove('hidden');
        
        // Restart scanner immediately on error
        setTimeout(() => {
            html5QrCode.start(
                cameraId, 
                {
                    fps: 10,
                    qrbox: { width: 250, height: 250 }
                },
                qrCodeMessage => {
                    html5QrCode.stop();
                    verifyTicket(qrCodeMessage);
                },
                errorMessage => {}
            );
        }, 1500);
    }
}
        });
    </script>
</body>
</html>
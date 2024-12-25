<div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50">
    @if (!$isAuthenticated)
        <div class="min-h-screen flex items-center justify-center p-4">
            <div
                class="bg-white p-6 md:p-8 rounded-lg shadow-lg w-full max-w-md transform transition-all hover:scale-102">
                <h2
                    class="text-2xl font-bold mb-6 text-center bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Admin Login</h2>
                <div class="space-y-4">
                    <input type="password" wire:model.defer="pin" placeholder="Enter PIN"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                    <button wire:click="authenticate"
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg hover:opacity-90 transform transition-all active:scale-95 font-semibold">
                        Login
                    </button>
                </div>
            </div>
        </div>
    @else
        <div class="container mx-auto px-4 py-8">
            <!-- Header with Logout -->
            <div class="flex justify-between items-center mb-8">
                <h1
                    class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Admin Panel</h1>
                <button wire:click="logout"
                    class="px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all">Logout</button>
            </div>

            <!-- Main Redeem Section -->
            <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
                <h2
                    class="text-xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Redeem Ticket</h2>
                <div class="space-y-4">
                    <div class="flex gap-4">
                        <input type="text" wire:model.defer="redemptionCode" placeholder="Enter redemption code"
                            id="redemptionCodeInput"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                        <button onclick="window.startScanner()"
                            class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v1m6 11h2m-6 0h-2m0 0H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                    <div id="reader" class="hidden"></div>
                    <button wire:click="redeemTicket"
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg hover:opacity-90 transform transition-all active:scale-95 font-semibold">
                        Redeem Ticket
                    </button>
                </div>
            </div>

            <script src="https://unpkg.com/html5-qrcode"></script>
            <script>
                window.html5QrcodeScanner = null;

                window.startScanner = function() {
                    const reader = document.getElementById('reader');
                    reader.classList.remove('hidden');

                    if (window.html5QrcodeScanner === null) {
                        window.html5QrcodeScanner = new Html5QrcodeScanner(
                            "reader", {
                                fps: 10,
                                qrbox: 250
                            }
                        );
                    }

                    window.html5QrcodeScanner.render((decodedText) => {
                        // Handle the scanned code
                        document.getElementById('redemptionCodeInput').value = decodedText;
                        @this.set('redemptionCode', decodedText);
                        window.html5QrcodeScanner.clear();
                        reader.classList.add('hidden');
                    });
                }
            </script>
            </script>
            <!-- Collapsible Sections -->
            <div class="space-y-6">
                <!-- Stats Section -->
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <button @click="open = !open"
                        class="w-full p-4 flex justify-between items-center bg-gradient-to-r from-blue-50 to-purple-50">
                        <span class="font-semibold">Quick Statistics</span>
                        <svg :class="{ 'rotate-180': open }" class="w-5 h-5 transform transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse>
                        <div class="p-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-lg text-white">
                                <p class="text-sm opacity-80">Total Tickets</p>
                                <p class="text-2xl font-bold">{{ $stats['total_tickets'] }}</p>
                            </div>
                            <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-lg text-white">
                                <p class="text-sm opacity-80">Used Tickets</p>
                                <p class="text-2xl font-bold">{{ $stats['used_tickets'] }}</p>
                            </div>
                            <div class="bg-gradient-to-br from-pink-500 to-pink-600 p-4 rounded-lg text-white">
                                <p class="text-sm opacity-80">Pending</p>
                                <p class="text-2xl font-bold">{{ $stats['pending_bookings'] }}</p>
                            </div>
                            <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-4 rounded-lg text-white">
                                <p class="text-sm opacity-80">Customers</p>
                                <p class="text-2xl font-bold">{{ $stats['total_customers'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Tickets Section -->
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <button @click="open = !open"
                        class="w-full p-4 flex justify-between items-center bg-gradient-to-r from-blue-50 to-purple-50">
                        <span class="font-semibold">Recent Tickets</span>
                        <svg :class="{ 'rotate-180': open }" class="w-5 h-5 transform transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="overflow-x-auto">
                        <table class="w-full min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Customer</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Type</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Created</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($recentTickets as $ticket)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3">{{ $ticket->customer->name }}</td>
                                        <td class="px-4 py-3">{{ $ticket->ticket_type }}</td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs {{ $ticket->is_used ? 'bg-gray-100' : 'bg-green-100 text-green-800' }}">
                                                {{ $ticket->is_used ? 'Used' : 'Active' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{ $ticket->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Bookings Section -->
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <button @click="open = !open"
                        class="w-full p-4 flex justify-between items-center bg-gradient-to-r from-blue-50 to-purple-50">
                        <span class="font-semibold">Recent Bookings</span>
                        <svg :class="{ 'rotate-180': open }" class="w-5 h-5 transform transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="overflow-x-auto">
                        <table class="w-full min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Customer</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Reference</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Expires</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($pendingBookings as $booking)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3">{{ $booking->customer->name }}</td>
                                        <td class="px-4 py-3">{{ $booking->booking_reference }}</td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $booking->expires_at ? \Carbon\Carbon::parse($booking->expires_at)->diffForHumans() : 'N/A' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Create Ticket Type Section -->
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <button @click="open = !open"
                        class="w-full p-4 flex justify-between items-center bg-gradient-to-r from-blue-50 to-purple-50">
                        <span class="font-semibold">Create New Ticket Type</span>
                        <svg :class="{ 'rotate-180': open }" class="w-5 h-5 transform transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse>
                        <form wire:submit.prevent="createTicketType" class="p-4 space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Name</label>
                                    <input type="text" wire:model.defer="ticketType.name"
                                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Price</label>
                                    <input type="number" step="0.01" wire:model.defer="ticketType.price"
                                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Available Quantity</label>
                                    <input type="number" wire:model.defer="ticketType.available_quantity"
                                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Description</label>
                                    <textarea wire:model.defer="ticketType.description"
                                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Sale Starts At</label>
                                    <input type="datetime-local" wire:model.defer="ticketType.sale_starts_at"
                                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Sale Ends At</label>
                                    <input type="datetime-local" wire:model.defer="ticketType.sale_ends_at"
                                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg hover:opacity-90 transform transition-all active:scale-95 font-semibold">
                                Create Ticket Type
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Notifications -->
            <div x-data="{ show: false, message: '', type: '' }"
                x-on:success.window="show = true; message = $event.detail; type = 'success'; setTimeout(() => show = false, 3000)"
                x-on:error.window="show = true; message = $event.detail; type = 'error'; setTimeout(() => show = false, 3000)">
                <div x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                    class="fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg"
                    :class="{ 'bg-green-100 text-green-900': type === 'success', 'bg-red-100 text-red-900': type === 'error' }">
                    <div class="flex items-center space-x-3">
                        <svg x-show="type === 'success'" class="w-6 h-6 text-green-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <svg x-show="type === 'error'" class="w-6 h-6 text-red-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span x-text="message"></span>
                    </div>
                </div>

            </div>

        </div>
    @endif
</div>

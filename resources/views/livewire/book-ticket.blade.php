<!-- Slide-over panel -->
<div x-data="{ open: false }" @keydown.window.escape="open = false">
    <!-- Trigger button -->
    <a href="#" @click.prevent="open = true" class="block w-full sm:w-auto text-center bg-white text-purple-600 px-4 sm:px-8 py-3 rounded-full font-bold hover:bg-purple-100 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">Book Ticket Now</a>
    <!-- Slide-over panel -->
    <div x-show="open"
         class="fixed inset-0 overflow-hidden z-50"
         x-transition:enter="transform transition ease-in-out duration-500"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transform transition ease-in-out duration-500"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full">
        <div class="absolute inset-0 overflow-hidden">
            <!-- Background overlay -->
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                 @click="open = false"></div>

            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-4 sm:pl-10">
                <div class="pointer-events-auto w-screen max-w-md">
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl rounded-l-xl">
                        <!-- Header -->
                        <div class="sticky top-0 z-10 bg-white px-4 sm:px-6 py-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">Book Your Tickets</h2>
                                <button @click="open = false" class="rounded-full p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="relative flex-1 px-4 sm:px-6 py-4">
                            <div class="space-y-6 sm:space-y-8">
                                <!-- Step indicator -->
                                <div class="relative mt-8 sm:mt-0">
                                    <div class="absolute left-0 top-1/2 h-0.5 w-full -translate-y-1/2 transform bg-gray-200"></div>
                                    <div class="relative flex justify-between">
                                        <div class="step" :class="{'active': step >= 1}">
                                            <div class="absolute -bottom-[2rem] w-max text-xs sm:text-sm font-medium text-gray-500">Personal Info</div>
                                            <div class="relative h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-white border-2 border-indigo-600 flex items-center justify-center">
                                                <div class="h-3 w-3 sm:h-4 sm:w-4 rounded-full bg-indigo-600"></div>
                                            </div>
                                        </div>
                                        <div class="step" :class="{'active': step >= 2}">
                                            <div class="absolute -bottom-[2rem] w-max text-xs sm:text-sm font-medium text-gray-500">Select Tickets</div>
                                            <div class="relative h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-white border-2 border-indigo-600 flex items-center justify-center">
                                                <div class="h-3 w-3 sm:h-4 sm:w-4 rounded-full bg-indigo-600"></div>
                                            </div>
                                        </div>
                                        <div class="step" :class="{'active': step >= 3}">
                                            <div class="absolute -bottom-[2rem] w-max text-xs sm:text-sm font-medium text-gray-500">Payment</div>
                                            <div class="relative h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-white border-2 border-indigo-600 flex items-center justify-center">
                                                <div class="h-3 w-3 sm:h-4 sm:w-4 rounded-full bg-indigo-600"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form content -->
                                <div class="mt-14 sm:mt-12">
                                    @if($step === 1)
                                        <form wire:submit.prevent="nextStep" class="space-y-4 sm:space-y-6">
                                            <div class="space-y-2">
                                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                                <div class="relative">
                                                    <input wire:model="name" type="text" class="mt-1 block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150 ease-in-out text-sm sm:text-base">
                                                    @error('name') <span class="absolute -bottom-5 left-0 text-red-500 text-xs sm:text-sm">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <label class="block text-sm font-medium text-gray-700">Email <span class="text-xs text-gray-500">(Your tickets will be sent here)</span></label>
                                                <div class="relative">
                                                    <input wire:model="email" type="email" class="mt-1 block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150 ease-in-out text-sm sm:text-base">
                                                    @error('email') <span class="absolute -bottom-5 left-0 text-red-500 text-xs sm:text-sm">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                                <div class="relative">
                                                    <input wire:model="phone" type="tel" class="mt-1 block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150 ease-in-out text-sm sm:text-base">
                                                    @error('phone') <span class="absolute -bottom-5 left-0 text-red-500 text-xs sm:text-sm">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-2 sm:py-3 px-4 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-sm sm:text-base">
                                                <span wire:loading.remove wire:target="nextStep">Continue</span>
                                                <span wire:loading wire:target="nextStep">Processing...</span>
                                            </button>
                                        </form>
                                    @elseif($step === 2)
                                        <form wire:submit.prevent="nextStep" class="space-y-4 sm:space-y-6">
                                            <div class="space-y-2">
                                                <label class="block text-sm font-medium text-gray-700">Ticket Type</label>
                                                <div class="relative">
                                                    <select wire:model="selectedTicketType" class="mt-1 block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150 ease-in-out text-sm sm:text-base">
                                                        <option value="">Select a ticket type</option>
                                                        @foreach($ticketTypes as $type)
                                                            <option value="{{ $type->id }}">{{ $type->name }} - ₦{{ $type->price }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('selectedTicketType') <span class="absolute -bottom-5 left-0 text-red-500 text-xs sm:text-sm">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <label class="block text-sm font-medium text-gray-700">Quantity</label>
                                                <div class="relative">
                                                    <input wire:model="quantity" type="number" min="1" class="mt-1 block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150 ease-in-out text-sm sm:text-base">
                                                    @error('quantity') <span class="absolute -bottom-5 left-0 text-red-500 text-xs sm:text-sm">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                                                <button type="button" wire:click="previousStep" class="w-full sm:flex-1 bg-gray-100 text-gray-800 py-2 sm:py-3 px-4 rounded-lg hover:bg-gray-200 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-sm sm:text-base">
                                                    <span wire:loading.remove wire:target="previousStep">Back</span>
                                                    <span wire:loading wire:target="previousStep">Loading...</span>
                                                </button>
                                                <button type="submit" class="w-full sm:flex-1 bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-2 sm:py-3 px-4 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-sm sm:text-base">
                                                    <span wire:loading.remove wire:target="nextStep">Continue to Payment</span>
                                                    <span wire:loading wire:target="nextStep">Processing...</span>
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <div class="text-center space-y-4 sm:space-y-6">
                                            <div class="animate-pulse bg-gradient-to-r from-purple-600 to-indigo-600 p-4 sm:p-6 rounded-lg shadow-lg">
                                                <h3 class="text-lg sm:text-xl font-bold text-white">Processing Payment</h3>
                                                <p class="text-white/80 text-sm sm:text-base">Please wait while we process your payment...</p>
                                            </div>
                                            <button wire:click="processPayment" class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white py-2 sm:py-3 px-4 rounded-lg hover:from-green-600 hover:to-emerald-600 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-sm sm:text-base">
                                                <span wire:loading.remove wire:target="processPayment">Confirm Payment</span>
                                                <span wire:loading wire:target="processPayment">Processing Payment...</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('front.layouts.app')
@section('css')
@endsection
@section('content')
   
    <!-- Banner Section -->
    <section class="relative h-80 w-full bg-cover bg-center" style="background-image: url('../../assets/homepagebg.jpg');">
        <div class="absolute inset-0 bg-white dark:bg-black bg-opacity-50 dark:bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-black dark:text-white text-3xl md:text-5xl font-bold tracking-wide">Bit Logs</h1>
            <!-- Breadcrumb -->
            <div class="container mx-auto px-4 md:px-8 py-4">
                <nav class="text-sm text-gray-800 dark:text-gray-200">
                    <a href="/" class="hover:text-purple-600 font-bold">Home</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">Bit Logs</span>
                </nav>
            </div>
        </div>
    </section>
    <?php
    // Bit logs data
    $logs = [
        [
            'user_image' => 'https://images.unsplash.com/photo-1593118247619-e2d6f056869e?q=80&w=2070',
            'title' => 'Lorem ipsum',
            'subtitle' => 'lorem ipsum dolor sit amet',
            'rejection_reason' => 'Lorem ipsum dolor sit amet',
            'date' => '12 Oct 2024',
            'time' => '14:23:49',
            'bits' => '5',
            'status' => [
                'text' => 'Completed',
                'class' => 'bg-green-900 text-green-400'
            ]
        ],
        [
            'user_image' => 'https://images.unsplash.com/photo-1593118247619-e2d6f056869e?q=80&w=2070',
            'title' => 'Lorem ipsum',
            'subtitle' => 'lorem ipsum dolor sit amet',
            'rejection_reason' => 'Lorem ipsum dolor sit amet',
            'date' => '12 Oct 2024',
            'time' => '14:23:49',
            'bits' => '15',
            'status' => [
                'text' => 'Processing',
                'class' => 'bg-indigo-900 text-indigo-400'
            ]
        ],
        [
            'user_image' => 'https://images.unsplash.com/photo-1593118247619-e2d6f056869e?q=80&w=2070',
            'title' => 'Lorem ipsum',
            'subtitle' => 'lorem ipsum dolor sit amet',
            'rejection_reason' => 'Lorem ipsum dolor sit amet',
            'date' => '12 Oct 2024',
            'time' => '14:23:49',
            'bits' => '25',
            'status' => [
                'text' => 'Rejected',
                'class' => 'bg-red-900 text-red-400'
            ]
        ],
        [
            'user_image' => 'https://images.unsplash.com/photo-1593118247619-e2d6f056869e?q=80&w=2070',
            'title' => 'Lorem ipsum',
            'subtitle' => 'lorem ipsum dolor sit amet',
            'rejection_reason' => 'Lorem ipsum dolor sit amet',
            'date' => '12 Oct 2024',
            'time' => '14:23:49',
            'bits' => '10',
            'status' => [
                'text' => 'Completed',
                'class' => 'bg-green-900 text-green-400'
            ]
        ],
        [
            'user_image' => 'https://images.unsplash.com/photo-1593118247619-e2d6f056869e?q=80&w=2070',
            'title' => 'Lorem ipsum',
            'subtitle' => 'lorem ipsum dolor sit amet',
            'rejection_reason' => 'Lorem ipsum dolor sit amet',
            'date' => '12 Oct 2024',
            'time' => '14:23:49',
            'bits' => '10',
            'status' => [
                'text' => 'Completed',
                'class' => 'bg-green-900 text-green-400'
            ]
        ],
        [
            'user_image' => 'https://images.unsplash.com/photo-1593118247619-e2d6f056869e?q=80&w=2070',
            'title' => 'Lorem ipsum',
            'subtitle' => 'lorem ipsum dolor sit amet',
            'rejection_reason' => 'Lorem ipsum dolor sit amet',
            'date' => '12 Oct 2024',
            'time' => '14:23:49',
            'bits' => '10',
            'status' => [
                'text' => 'Pending',
                'class' => 'bg-indigo-900 text-indigo-400'
            ]
        ],
    ];
    ?>

    <!-- Bit Logs Section -->
    <section class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left gap-4 mb-2">
                <!-- Heading (Centered on Small, Left on Large) -->
                <div class="w-full sm:w-auto">
                    <h1 class="text-2xl font-bold dark:text-white">Bit Logs</h1>
                </div>

                <!-- Action Buttons (Right on Large Screens) -->
                <div class="flex flex-col sm:flex-row sm:justify-end w-full sm:w-auto gap-4">
                    <button id="openBitSchemeModal" class="w-full sm:w-40 bg-primary-gradient text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:shadow-lg transition-all duration-300">
                        Bit Scheme
                    </button>
                    <button id="openEarnBitModal" class="w-full sm:w-40 bg-primary-gradient text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:shadow-lg transition-all duration-300">
                        Earn Bit
                    </button>
                </div>
            </div>



            <!-- horizontal line -->
            <div class="w-full h-[3px] bg-gray-300 dark:bg-gray-600 rounded-full mb-10"></div>

            <!-- Logs Table -->
            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg overflow-x-auto">
                <!-- Table Header -->
                <?php
                $headers = ['Info', 'Rejection Reason', 'DATE', 'TIME', 'Bit', 'STATUS'];
                $colSpans = [2, 3, 2, 2, 1, 2];
                ?>
                <div class="min-w-[800px]"> <!-- Minimum width container -->
                    <div class="grid grid-cols-12 gap-2 bg-white dark:bg-gray-700 px-4 py-3 text-gray-700 dark:text-gray-300">
                        <?php foreach ($headers as $index => $header): ?>
                            <div class="col-span-<?= $colSpans[$index] ?> text-sm md:text-base"><?= $header ?></div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Table Rows -->
                    <?php foreach ($logs as $index => $log): ?>
                        <div class="grid grid-cols-12 gap-2 px-4 py-4 <?= $index < count($logs) - 1 ? 'border-b border-gray-400 dark:border-gray-700' : '' ?> items-center">
                            <!-- User Info -->
                            <div class="col-span-2 flex items-center">
                                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full overflow-hidden mr-2 md:mr-3 flex-shrink-0">
                                    <img src="<?= $log['user_image'] ?>" alt="User" class="w-full h-full object-cover">
                                </div>
                                <div class="min-w-0"> <!-- Prevent text overflow -->
                                    <p class="font-medium text-sm md:text-base truncate"><?= $log['title'] ?></p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 truncate"><?= $log['subtitle'] ?></p>
                                </div>
                            </div>
                            <!-- Other Columns -->
                            <div class="col-span-3 text-gray-700 dark:text-gray-300 text-sm md:text-base truncate"><?= $log['rejection_reason'] ?></div>
                            <div class="col-span-2 text-gray-700 dark:text-gray-300 text-sm md:text-base"><?= $log['date'] ?></div>
                            <div class="col-span-2 text-gray-700 dark:text-gray-300 text-sm md:text-base"><?= $log['time'] ?></div>
                            <div class="col-span-1 text-gray-700 dark:text-gray-300 text-sm md:text-base"><?= $log['bits'] ?></div>
                            <div class="col-span-2">
                                <span class="w-24 flex items-center justify-center px-2 md:px-3 py-1 <?= $log['status']['class'] ?> rounded-md text-xs md:text-sm">
                                    <?= $log['status']['text'] ?>
                                </span>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav class="inline-flex shadow-md rounded-lg overflow-hidden">
                <a href="#" class="px-5 py-3 bg-primary text-white text-sm font-medium transition-colors duration-300">1</a>
                <a href="#" class="px-5 py-3 bg-white border-t border-b border-r border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 transition-colors duration-300">2</a>
                <a href="#" class="px-5 py-3 bg-white border-t border-b border-r border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 transition-colors duration-300">3</a>
                <a href="#" class="px-5 py-3 bg-white border-t border-b border-r border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100 transition-colors duration-300 group flex items-center">
                    <span>Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </nav>
        </div>
    </section>

    <!-- Bit Scheme Modal -->
    <div id="bitSchemeModal" class="fixed inset-0 z-50 hidden ">
        <!-- Modal Backdrop -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Modal Content (Scrollable) -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md max-h-[90vh] bg-gray-100 dark:bg-gray-900 rounded-lg shadow-xl overflow-hidden flex flex-col">
            <!-- Modal Header (Fixed) -->
            <div class="p-4 flex justify-between items-center border-b border-gray-800 bg-white dark:bg-gray-800 sticky top-0 z-10">
                <h2 class="text-xl font-semibold">Bits Scheme</h2>
                <button class="close-modal text-gray-400 hover:text-gray-800 dark:hover:text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body (Scrollable) -->
            <div class="p-4 overflow-y-auto flex-1 scrollbar-hide">
                <!-- Conversion Rate -->
                <div class="text-center mb-6">
                    <p class="text-gray-700 dark:text-gray-300 mb-2">1 Pound Sterling is equal to</p>
                    <p class=" text-2xl font-bold">100 bits</p>
                </div>

                <!-- Discord link -->
                <div class="text-center mb-6">
                    <p class="text-gray-700 dark:text-gray-300">
                        Find bits' rules discord
                        <a href="#" class="text-indigo-400 hover:text-indigo-300">here!</a>
                    </p>
                </div>

                <!-- Rules Table -->
                <div class="mt-4">
                    <!-- Table Header -->
                    <div class="grid grid-cols-12 gap-2 px-4 py-3 rounded-t-lg bg-white dark:bg-gray-800">
                        <div class="col-span-9 text-gray-700 dark:text-gray-300 font-medium">Rejection Reason</div>
                        <div class="col-span-3 text-right text-gray-700 dark:text-gray-300 font-medium">Bit</div>
                    </div>

                    <!-- Table Body (Scrollable) -->
                    <div class="mt-1 space-y-3">
                        <!-- Table Rows -->
                        <?php for ($i = 0; $i < 15; $i++) : ?>
                            <div class="grid grid-cols-12 gap-2 px-4 py-3 border-b border-gray-800">
                                <div class="col-span-9 text-gray-700 dark:text-gray-300">Lorem ipsum dolor sit amet</div>
                                <div class="col-span-3 text-right text-gray-700 dark:text-gray-300 font-medium">9</div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earn Bit Modal -->
    <div id="earnBitModal" class="fixed inset-0 z-50 hidden">
        <!-- Modal Backdrop -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <!-- Modal Content -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md ">
            <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300 rounded-lg shadow-xl overflow-hidden">
                <!-- Modal Header -->
                <div class="relative p-6 pb-3 flex justify-between items-center">
                    <h2 class="text-2xl font-semibold">Earn Bits</h2>
                    <button class="close-modal text-gray-400 hover:text-gray-700 dark:hover:text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-6 pt-3">
                    <form id="earnBitsForm">

                        <div class="mb-4">
                            <label for="bits" class="block mb-2">Select an Option</label>
                            <select
                                id="bits"
                                class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-600 rounded-md text-gray-500 dark:text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="" disabled selected>Select an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block mb-2">Your Message</label>
                            <textarea
                                id="description"
                                class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500"
                                placeholder="Write your thoughts here..."></textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-6">
                            <label class="block mb-2">Add images</label>
                            <div class="flex items-start">
                                <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 border border-dashed border-gray-500 rounded-md flex items-center justify-center cursor-pointer hover:bg-gray-600 transition">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button class="mx-auto w-full mt-2 text-center bg-primary-gradient text-white px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:shadow-lg transition-all duration-300 group">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

@endsection
@section('script')

<!-- Script to open modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Bit Scheme Modal
            const bitSchemeModal = document.getElementById('bitSchemeModal');
            const openBitSchemeModalBtn = document.getElementById('openBitSchemeModal');
            const closeBitSchemeModalBtn = bitSchemeModal.querySelector('.close-modal');
            const bitSchemeBackdrop = bitSchemeModal.querySelector('.absolute.inset-0');

            // Earn Bit Modal
            const earnBitModal = document.getElementById('earnBitModal');
            const openEarnBitModalBtn = document.getElementById('openEarnBitModal');
            const closeEmailModalBtn = earnBitModal.querySelector('.close-modal');
            const sendEmailBackdrop = earnBitModal.querySelector('.absolute.inset-0');

            function openModal(modal) {
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }

            function closeModal(modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }

            // Open modal event listeners
            openBitSchemeModalBtn.addEventListener('click', () => openModal(bitSchemeModal));
            openEarnBitModalBtn.addEventListener('click', () => openModal(earnBitModal));

            // Close modal event listeners
            closeBitSchemeModalBtn.addEventListener('click', () => closeModal(bitSchemeModal));
            bitSchemeBackdrop.addEventListener('click', () => closeModal(bitSchemeModal));

            closeEmailModalBtn.addEventListener('click', () => closeModal(earnBitModal));
            sendEmailBackdrop.addEventListener('click', () => closeModal(earnBitModal));
        });
    </script>
@endsection
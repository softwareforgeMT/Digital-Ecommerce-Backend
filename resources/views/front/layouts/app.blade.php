<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
 

    <!-- Dynamic Meta Tags for SEO -->
  <title>@yield('meta_title') | {{$gs->name}}</title>
  <meta name="description" content="@yield('meta_description', $gs->slogan)">
  
  <link rel="canonical" href="@yield('canonical', url()->current())">

  @hasSection('meta')
    @yield('meta')
  @else
   <meta name="keywords" content="@yield('meta_keywords', $gs->keywords ?? '')">
  @endif

 



  <style>
        :root {
            --tw-bg-opacity: 1;
            --color-bg-alt: 249, 250, 251;
            --color-border: 229, 231, 235;
            --color-primary: 124, 58, 237;
            --color-primary-light: 139, 92, 246;
            --color-text: 17, 24, 39;
            --color-text-light: 107, 114, 128;
        }

        .dark {
            --color-bg-alt: 31, 41, 55;
            --color-border: 55, 65, 81;
            --color-primary: 139, 92, 246;
            --color-primary-light: 167, 139, 250;
            --color-text: 229, 231, 235;
            --color-text-light: 156, 163, 175;
        }
    </style>
 <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
      tailwind.config = {
          darkMode: 'class',
          theme: {
              extend: {
                  // ... your theme extensions
              }
          }
      }
  </script>

  <!-- Theme Initialization Script -->
  <script>
      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
      if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          document.documentElement.classList.add('dark');
      } else {
          document.documentElement.classList.remove('dark');
      }
  </script>

  <link rel="stylesheet" href="{{asset('assets/front/css/output.css')}}" />

    <!-- Tailwind CDN -->
   
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

  <!-- Alpine.js -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  @yield('css')
</head>

<body
  class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white transition-colors duration-300">
  <!-- Navigation Bar -->
  @include('front.layouts.navbar')


  <!-- Main Content -->
  @yield('content')


  @include('front.layouts.footer')

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <!-- <script src="../js/main.js"></script> -->
  <script src="{{asset('assets/front/js/theme.js')}}"></script>
  <script src="{{asset('assets/front/js/navbar.js')}}"></script>
  

  <!-- Add AOS Animation Library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


  <!-- Theme Toggle Script -->
  <script>
      var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
      var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

      // Change the icons inside the button based on previous settings
      if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          themeToggleLightIcon?.classList.remove('hidden');
      } else {
          themeToggleDarkIcon?.classList.remove('hidden');
      }

      var themeToggleBtn = document.getElementById('theme-toggle');

      themeToggleBtn?.addEventListener('click', function() {
          // Toggle icons
          themeToggleDarkIcon.classList.toggle('hidden');
          themeToggleLightIcon.classList.toggle('hidden');

          // If is set in localStorage
          if (localStorage.getItem('color-theme')) {
              if (localStorage.getItem('color-theme') === 'light') {
                  document.documentElement.classList.add('dark');
                  localStorage.setItem('color-theme', 'dark');
              } else {
                  document.documentElement.classList.remove('dark');
                  localStorage.setItem('color-theme', 'light');
              }
          } else {
              if (document.documentElement.classList.contains('dark')) {
                  document.documentElement.classList.remove('dark');
                  localStorage.setItem('color-theme', 'light');
              } else {
                  document.documentElement.classList.add('dark');
                  localStorage.setItem('color-theme', 'dark');
              }
          }
      });
  </script>

  @yield('script')
  @stack('scripts')
  @stack('script')
  <script>
  // Cart functionality
  document.addEventListener('DOMContentLoaded', function() {
      function updateCartCount(count) {
          const cartCount = document.getElementById('cart-count');
          if (cartCount) {
              cartCount.textContent = count;
          }
      }

      // Make updateCartCount available globally
      window.updateCartCount = updateCartCount;

      // Cart dropdown functionality
      const cartToggle = document.querySelector('.cart-toggle');
      const cartDropdown = document.getElementById('cart-dropdown');
      
      if (cartToggle && cartDropdown) {
          cartToggle.addEventListener('click', function(e) {
              e.preventDefault();
              cartDropdown.classList.toggle('hidden');
          });

          // Close dropdown when clicking outside
          document.addEventListener('click', function(e) {
              if (!cartToggle.contains(e.target) && !cartDropdown.contains(e.target)) {
                  cartDropdown.classList.add('hidden');
              }
          });
      }

      // Cart functions
      window.removeCartItem = function(itemId) {
          fetch(`{{ route('front.cart.remove', ':id') }}`.replace(':id', itemId), {
              method: 'DELETE',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              }
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  location.reload();
              }
          });
      }

      window.updateCartCount = function(count) {
          document.getElementById('cart-count').textContent = count;
      }
  });
  </script>

  <!-- Add the review modal script -->
  <script src="{{ asset('js/review-modal.js') }}"></script>

</body>

</html>
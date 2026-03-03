<div class="lg:max-w-1/3 flex w-full shrink-0 xl:mr-8 xl:w-40">
  <a href="$LocalalisedHomeLink" class="mx-auto xl:mx-0">
    <img class="h-28 md:h-32 xl:h-40" src="<%-- $resourceURL('themes/mytheme/images/logo.svg') --%>" alt="Logo" />
  </a>
</div>

<nav class="flex w-0 px-16 lg:w-full">
  <ul class="hidden w-full items-center justify-between xl:flex">
    <% loop $Menu(1) %>
    <li class="content-right flex flex-col tracking-widest">
      <a
        href="$Link"
        class="<% if $IsSection %>text-primary-500 <% end_if %> border-b-2 border-solid border-primary-500 text-lg uppercase text-gray-700 transition-colors duration-300 hover:text-primary-500"
      >
        $MenuTitle
      </a>
    </li>
    <% end_loop %>
  </ul>

  <div class="absolute left-6 top-6 flex items-center xl:hidden">
    <button class="mobile-menu-button flex flex-col outline-none" aria-label="Mobile Menu">
      <div class="line-1 mb-2 block h-1 w-10 bg-primary-500 transition-all"></div>
      <div class="line-2 mb-2 block h-1 w-10 bg-primary-500 transition-all"></div>
      <div class="line-3 block h-1 w-10 bg-primary-500 transition-all"></div>
    </button>
  </div>

  <div
    class="mobile-menu pointer-events-none absolute left-0 right-0 top-[143px] z-50 h-screen max-h-0 w-full bg-gray-300 py-2 opacity-0 transition-all xl:hidden"
  >
    <ul class="">
      <% loop $Menu(1) %>
      <li class="ml-10 p-2">
        <a
          href="$Link"
          class="<% if $IsSection %>text-primary-500 <% end_if %> inline border-b-2 border-solid border-primary-500 py-1 text-lg uppercase text-gray-700 hover:text-primary-500"
        >
          $MenuTitle
        </a>
      </li>
      <% end_loop %>
    </ul>
  </div>
</nav>

<script>
  // Grab HTML Elements
  const btn = document.querySelector("button.mobile-menu-button");
  const menu = document.querySelector(".mobile-menu");

  // Add Event Listeners
  btn.addEventListener("click", () => {
    menu.classList.toggle("opacity-100");
    menu.classList.toggle("max-h-0");
    menu.classList.toggle("max-h-screen");
    menu.classList.toggle("pointer-events-auto");

    btn.querySelector(".line-1").classList.toggle("rotate-45");
    btn.querySelector(".line-1").classList.toggle("translate-y-3");

    btn.querySelector(".line-2").classList.toggle("opacity-0");

    btn.querySelector(".line-3").classList.toggle("-rotate-45");
    btn.querySelector(".line-3").classList.toggle("-translate-y-3");
  });
</script>

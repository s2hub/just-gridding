<header class="w-full border-b-4 border-solid border-primary-500 bg-white">
  <section class="relative mx-auto flex w-full max-w-6xl py-2">
    <% include Navigation %>
    <div class="secondary-nav absolute right-1 flex rounded-b-3xl bg-gray-300 pl-4 xl:top-0 xl:bg-white">
      <div class="flex items-center text-sm uppercase tracking-normal">
        <div class="mr-5 flex cursor-pointer" id="header-address-toggle">
          <%--
          <span class="text-xs max-xl:drop-shadow-white xl:text-sm"><img src="$resourceURL('themes/mytheme/images/email-action-unread-1.svg')" alt="E-Mail" class="mr-3 h-4 xl:h-5" /></span>
          --%>
          <span class="text-xs max-xl:drop-shadow-white xl:text-sm">
            <img src="<%-- $resourceURL('themes/mytheme/images/phone-2.svg') --%>" alt="E-Mail" class="mr-1 h-4 xl:h-5" />
          </span>
          <%--
          <span class="text-xs max-xl:drop-shadow-white xl:text-sm"><img src="$resourceURL('themes/mytheme/images/maps-pin-1.svg')" alt="E-Mail" class="mr-3 h-4 xl:h-5" /></span>
          --%>
          <span><%t Header.Contact 'Contact' %></span>
        </div>
        <div class="mr-3 flex md:mr-5">
          <a class="text-xs max-xl:drop-shadow-white xl:text-sm" href="$LocaleInformation('de_DE').Link">
            <img src="<%-- $resourceURL('themes/mytheme/images/flag_de.svg')--%>" alt="Flagge Deutschland" class="mr-3 h-4 xl:h-6" />
          </a>
          <a class="hidden text-xs max-xl:drop-shadow-white md:block xl:text-sm" href="$LocaleInformation('de_DE').Link">Deutsch</a>
        </div>

        <div class="mr-5 flex">
          <a class="text-xs max-xl:drop-shadow-white xl:text-sm" href="$LocaleInformation('en_GB').Link">
            <img src="<%--$resourceURL('themes/mytheme/images/flag_en.svg')--%>" alt="Flag Britain" class="mr-3 h-4 xl:h-6" />
          </a>
          <a class="hidden text-xs max-xl:drop-shadow-white md:block xl:text-sm" href="$LocaleInformation('en_GB').Link">English</a>
        </div>
      </div>
    </div>
  </section>
  <% include Address %>
</header>
<script>
  // Grab HTML Elements
  const toggle = document.querySelector("#header-address-toggle");
  const address = document.querySelector("#header-address");
  const addressClose = document.querySelector("#header-address-close");

  // Add Event Listeners
  toggle.addEventListener("click", () => {
    let isHidden = address.classList.contains("hidden");
    address.classList.remove("hidden");
    address.classList.toggle("opacity-100");
    if (!isHidden) {
      window.setTimeout(() => {
        address.classList.add("hidden");
      }, 500);
    }
  });
  addressClose.addEventListener("click", () => {
    let isHidden = address.classList.contains("hidden");
    address.classList.remove("hidden");
    address.classList.toggle("opacity-100");
    if (!isHidden) {
      window.setTimeout(() => {
        address.classList.add("hidden");
      }, 500);
    }
  });
</script>

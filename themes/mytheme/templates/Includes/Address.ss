<div
  id="header-address"
  class="absolute left-[50%] top-12 z-50 hidden translate-x-[-50%] rounded border-2 border-solid border-primary-500 bg-white p-6 opacity-0 shadow-lg transition-opacity"
>
  <div
    id="header-address-close"
    class="absolute -right-3 -top-3 h-6 w-6 rounded-full border-2 border-solid border-primary-500 bg-white text-center font-bold leading-4 text-primary-500"
  >
    x
  </div>
  <div class="w-md mx-auto leading-6" itemtype="http://schema.org/Hotel" itemscope="">
    <div class="no-wrap flex">
      <span itemprop="name" class="text-xl text-primary-500 md:text-2xl">NAME</span>
      <span itemprop="starRating" itemscope itemtype="http://schema.org/Rating" class="w-20">
        <span itemprop="author" itemscope itemtype="http://schema.org/Organization">
          <span itemprop="name" class="hidden">WKO</span>
        </span>
      </span>
    </div>
    <br />
    <div itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address">
      <span itemprop="streetAddress">STR</span>
      ,
      <span class="no-wrap">
        <span itemprop="postalCode">PLZ</span>
        <span itemprop="addressLocality">ORT</span>
        ,
        <span itemprop="addressCountry">Austria</span>
      </span>
      <br />
      <div class="mt-2">
        <img src="<%-- $resourceURL('themes/mytheme/images/phone-2.svg') --%>" alt="E-Mail" class="mr-1 inline h-4" />
        <a itemprop="telephone" class="text-primary-500" href="tel:+43xxxx" content="+43 xxx xxxx">+43 XXX XXXX</a>
      </div>

      <div class="mt-2">
        <img src="<%--$resourceURL('themes/mytheme/images/email-action-unread-1.svg')--%>" alt="E-Mail" class="mr-1 inline h-4" />
        <a itemprop="email" href="mailto:office@netwerkstatt.at" class="text-primary-500">office@netwerkstatt.at</a>
      </div>
    </div>

    <span itemtype="http://schema.org/GeoCoordinates" itemscope="" itemprop="geo">
      <meta content="47.56" itemprop="latitude" />
      <meta content="13.64" itemprop="longitude" />
    </span>
  </div>
</div>

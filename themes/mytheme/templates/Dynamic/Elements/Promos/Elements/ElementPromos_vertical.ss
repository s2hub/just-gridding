<div class="my-10 px-2 lg:px-0">
  <% include Netwerkstatt\Site\Element\ElementHeading %> <% if $Content %> $Content <% end_if %> <% if $PromoList %>
  <div class="color-black mx-auto w-full flex-col items-stretch text-base leading-6 lg:flex-row">
    <% loop $PromoList %>
    <div class="group my-16 flex w-full flex-col px-2 md:flex-row lg:px-0">
      <% if $Image %>
      <div class="swiper max-h-96 w-full object-cover lg:w-3/5 lg:group-odd:order-last">
        <div class="swiper-wrapper">
          <a href="$Image.URL" class="glightbox" data-gallery="gallery-$ID">
            <img src="$Image.FocusFill(800,600).URL" class="w-full object-cover" alt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>" />
          </a>
          <%--
          <a href="$Image.URL" class="glightbox swiper-slide" data-gallery="gallery-$ID">
            --%> <%--
            <img src="$Image.FocusFill(800,600).URL" class="w-full object-cover" --% />
            <%-- alt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>">--%> <%--
          </a>
          --%>
        </div>
        <% if $PhotoGalleryImages.Count > 1 %>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <% end_if %>
      </div>
      <% end_if %>

      <div class="my-auto mb-10 mt-8 text-center lg:mb-0 lg:mt-0 lg:w-2/5 lg:group-odd:order-first">
        <% if $Title && $ShowTitle %>
        <h3 class="font-dosis mb-8 text-4xl text-primary-500">$Title</h3>
        <% end_if %> <% if $Content %>
        <div class="font-assistant mb-8 px-16 text-lg text-black">$Content</div>
        <% end_if %> <% if $ElementLink %>
        <p
          class="font-dosis mb-8 inline rounded-full bg-primary-500 px-8 py-4 uppercase tracking-widest text-white transition-colors duration-300 hover:bg-red-500"
        >
          $ElementLink
        </p>
        <% end_if %>
      </div>
    </div>
    <% end_loop %>
  </div>
  <% end_if %>
</div>

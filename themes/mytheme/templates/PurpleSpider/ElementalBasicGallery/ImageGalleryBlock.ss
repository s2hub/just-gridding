<div class="my-10 px-2 lg:px-0">
  <% if $Title && $ShowTitle %>
  <h2 class="mb-8 text-center text-4xl text-primary-500">$Title</h2>
  <% end_if %> <% if $PhotoGalleryImages %>
  <div class="swiper w-full max-w-[1200px]">
    <div class="swiper-wrapper">
      <% loop $PhotoGalleryImages %>
      <a href="$Image.FitMax(2400,2400).URL" class="glightbox swiper-slide object-cover" data-gallery="gallery-{$Up.ID}">
        <%-- <% with $Image.setHTMLClass('aspect-auto lg:aspect-cinema object-center object-cover flex').setImgHTMLClass('object-cover w-full h-full') %>--%> <%-- $Me--%> <%-- <% end_with %>--%>
        <img src="$Image.FocusFill(1200,600).URL" class="object-cover" />
      </a>
      <% end_loop %>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
  <% end_if %>
</div>

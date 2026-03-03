<div class="edgarindustries__elementalmap__block__content <% if $Style %>$CssStyle<% end_if %>">
  <% if $ShowMap %>
  <div id="elemental-map-{$ID}" class="z-40 aspect-cinema h-auto w-full"></div>
  <% end_if %> <% if $ShowMarkers %>
  <section class="mt-16">
    <div class="color-black mx-auto w-full items-stretch text-base leading-6">
      <% loop $Markers.Sort('Sort') %>
      <div class="group my-16 flex w-full flex-col px-2 md:flex-row lg:px-0">
        <% if $PhotoGalleryImages.count %>
        <div class="swiper max-h-96 w-full object-cover lg:w-3/5 lg:group-odd:order-last">
          <div class="swiper-wrapper">
            <% loop $PhotoGalleryImages %>
            <a href="$Image.DesktopImage.FitMax(2400,2400).URL" class="glightbox swiper-slide object-cover" data-gallery="gallery">
              <img src="$Image.DesktopImage.FocusFill(800,600).URL" class="object-cover" />
            </a>
            <% end_loop %>
          </div>
          <% if $PhotoGalleryImages.Count > 1 %>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <% end_if %>
        </div>
        <% end_if %>
        <div
          class="<% if $Top.Style != 'justmarkerscentered' %> lg:-mt-20<% end_if %> <% if $PhotoGalleryImages.count %> lg:w-2/5<% end_if %> my-auto mb-10 mt-8 text-center lg:mb-0 lg:group-odd:order-first"
        >
          <% if $Title %>
          <h3 class="font-dosis mb-8 text-4xl text-primary-500">$Title</h3>
          <% end_if %> <% if $Content %>
          <div class="font-assistant mb-8 px-16 text-lg text-black">$Content</div>
          <% end_if %>
        </div>
      </div>
      <% end_loop %>
    </div>
  </section>
  <% end_if %>
</div>

<% if $ShowMap %> <% require css('edgarindustries/silverstripe-elemental-map:client/leaflet.css') %> <% require javascript('edgarindustries/silverstripe-elemental-map:client/leaflet.js') %>

<script>
  var map{$ID} = L.map("elemental-map-{$ID}").setView([{$DefaultLatitude}, {$DefaultLongitude}], {$DefaultZoom});

  L.tileLayer("{$TileUrl.RAW}", {$LeafletParams.RAW}).addTo(map{$ID});

  <% if $Markers %>;
  <% loop $Markers %>;
  var map{$Up.ID}marker{$ID} = L.marker([{$Latitude}, {$Longitude}]).addTo(map{$Up.ID});

  <% if $PopupContent %>;
  map{$Up.ID}marker{$ID}.bindPopup(`{$PopupContent}`);
  <% end_if %>;
  <% end_loop %>;
  <% end_if %>;
</script>
<% end_if %>

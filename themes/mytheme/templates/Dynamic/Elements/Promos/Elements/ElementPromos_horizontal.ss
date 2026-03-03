<div class="my-10 px-2 lg:px-0">
  <% include Netwerkstatt\Site\Element\ElementHeading %> <% if $Content %> $Content <% end_if %> <% if $PromoList %>
  <div class="color-black flex flex-col items-stretch text-base font-light leading-6 lg:flex-row">
    <% loop $PromoList %> <% if $ElementLink %>
    <a
      href="{$ElementLink.LinkURL}"
      {$ElementLink.TargetAttr}
      class="<% if $Size == 'wide' %>order-first lg:order-none<% else %>text-center lg:w-1/4<% end_if %> group mx-2 my-4 flex shrink-0 grow flex-col text-center lg:my-0 lg:w-2/4 lg:first:ml-0 lg:last:mr-0"
    >
      <% include PromoContent %>
    </a>
    <% else %>
    <div
      class="<% if $Size == 'wide' %>order-first lg:order-none<% else %>text-center lg:w-1/4<% end_if %> group mx-2 my-4 flex shrink-0 grow flex-col text-center lg:my-0 lg:w-2/4 lg:first:ml-0 lg:last:mr-0"
    >
      <% include PromoContent %>
    </div>
    <% end_if %> <% end_loop %>
  </div>
  <% end_if %>
</div>

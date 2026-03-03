<div class="content-element__content<% if $Style %> $StyleVariant<% end_if %> py-12">
  <% if $ShowTitle %>
  <div class="flex w-full">
    <div class="mt-10 h-0.5 grow bg-primary-500 md:mt-12 lg:mt-16 lg:h-1"></div>
    <h1
      class="font-dosis my-6 max-w-sm shrink grow-0 px-4 text-center text-3xl uppercase text-primary-500 md:max-w-xl md:px-6 md:text-4xl lg:my-8 lg:max-w-3xl lg:px-8 lg:text-6xl"
    >
      $Title
    </h1>
    <div class="mt-10 h-0.5 grow bg-primary-500 md:mt-12 lg:mt-16 lg:h-1"></div>
  </div>
  <% end_if %>
  <div class="prose mx-auto max-w-4xl px-10 text-center lg:prose-xl md:px-0">$HTML</div>
</div>

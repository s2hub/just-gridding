<div
  class="<% if $First && $Size == 'full'%>aspect-auto items-center<% else %><% end_if %> flex overflow-hidden border-y-4 border-solid border-primary-500 object-center md:aspect-cinema lg:aspect-extra-wide"
>
  <% if $Image %> <% with $Image.setHTMLClass('aspect-auto lg:aspect-cinema object-none object-center w-full') %> $Me <% end_with %> <% end_if %>
</div>

<% if $ShowElement %>
<div
  class="element $SimpleClassName.LowerCase<% if $StyleVariant %> $StyleVariant<% end_if %><% if $ExtraClass %> $ExtraClass<% end_if %> w-full<% if $Size == 'default' %> mx-auto<% end_if %> max-w-6xl lg:scroll-mt-56"
  id="$Anchor"
>
  <%-- Size: $Size--%> $Element
</div>
<% end_if %>

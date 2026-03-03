<% if $Image &&  $Size == 'wide' %>
<img src="$Image.FocusFill(801,432).URL" class="h-96 w-full object-cover" lt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>" />
<% else_if $Image %>
<img src="$Image.FocusFill(477,432).URL" class="h-96 w-full object-cover" lt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>" />
<% end_if %>

<div class="flex flex-grow flex-col items-center justify-center bg-primary-500 p-6 lg:flex-row">
  <div class="h-full">
    <% if $Title && $ShowTitle %>
    <h3 class="font-dosis text-2xl font-medium text-white">$Title</h3>
    <% end_if %> <% if $Content %>
    <div class="font-dosis text-white">$Content</div>
    <% end_if %>
  </div>
</div>

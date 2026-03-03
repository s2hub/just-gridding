<ul $AttributesHTML>
  <% loop $Options %>
  <li class="$Class mr-4 inline-block">
    <input
      id="$ID"
      class="radio form-radio"
      name="$Name"
      type="radio"
      value="$Value"
      <% if $isChecked %>
      checked<% end_if %><% if $isDisabled %>
      disabled<% end_if %>
      <% if $Up.Required %>required<% end_if %>
    />
    <label for="$ID">$Title</label>
  </li>
  <% end_loop %>
</ul>

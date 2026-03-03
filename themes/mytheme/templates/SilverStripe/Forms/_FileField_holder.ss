<div id="$HolderID" class="field<% if $extraClass %> $extraClass<% end_if %> $HolderClasses my-3">
  <% if $Title %>
  <label class="left" for="$ID">
    $Title<% if $Required %>
    <span class="text-red-500">*</span>
    <% end_if %>
  </label>
  <% end_if %>
  <div class="middleColumn mr-4">
    <label for="$ID" class="drop-container">
      <span class="drop-title">Drop File Here</span>
      or $Field
    </label>
  </div>
  <% if $RightTitle %>
  <label class="right" for="$ID">$RightTitle</label>
  <% end_if %> <% if $Message %>
  <span class="message $MessageType">$Message</span>
  <% end_if %> <% if $Description %>
  <span class="description">$Description</span>
  <% end_if %>
</div>

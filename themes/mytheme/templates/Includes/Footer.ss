<footer class="site-footer mt-auto w-full grow-0 self-end bg-red-500 py-16">
  <div class="bg-green-500 container mx-auto max-w-6xl">
    <nav>
      <% cached $CurrentReadingMode, $CurrentUser.ID, $Locale, $MenuLink.max('LastEdited') %>
      <ul class="mx-4 flex flex-wrap justify-between leading-8 text-white lg:mx-0 lg:flex-nowrap lg:gap-4">
        <% loop $MenuSet('footer').Filter('ParentID',0) %>
        <li class="mb-8 w-1/2 lg:mb-0 lg:w-full">
          <% if $Enabled && $LinkURL %>
          <a href="{$LinkURL}" {$TargetAttr} class="$Class text-lg uppercase">{$Title}</a>
          <% if $Children %>
          <ul class="mt-2">
            <% loop $Children %> <% if $Enabled && $LinkURL %>
            <li>
              <a href="{$LinkURL}" {$TargetAttr}{$ClassAttr}>{$Title}</a>
            </li>
            <% end_if %> <% end_loop %>
          </ul>
          <% end_if %> <% end_if %>
        </li>
        <% end_loop %>
        <li>
          <% if $SiteConfig.CookieIsActive %>
          <span onClick="klaro.show();return false;" class="cursor-pointer"><%t Kraftausdruck\KlaroCookie.MODALLINK "Cookie settings" %></span>
          <% end_if %>
        </li>
      </ul>
      <% end_cached %>
    </nav>

    <div></div>

    <div><%-- Newsletter and Social Icons --%></div>
  </div>
</footer>

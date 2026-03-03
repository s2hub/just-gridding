<%--Piwik --%> <%--<% if $WrapInJsTags %>--%>
<script <% if $SiteConfig.CookieIsActive %>type="text/plain" data-type="application/javascript" data-name="matomo-analytics" <% end_if %>>
  <%--<% end_if %>--%>;
  console.log("Matomo OK");
  var _paq = _paq || [];
  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);

  (function () {
    var u = ("https:" == document.location.protocol ? "https" : "http") + ":$URL";
    _paq.push(["setTrackerUrl", u + "piwik.php"]);
    _paq.push(["setSiteId", "$SiteID"]);
    var d = document,
      g = d.createElement("script"),
      s = d.getElementsByTagName("script")[0];
    g.type = "text/javascript";
    g.defer = true;
    g.async = true;
    g.src = u + "piwik.js";
    s.parentNode.insertBefore(g, s);
  })();
  <%--<% if $WrapInJsTags %>--%>;
</script>
<%--<% end_if %>--%> <%--End Piwik Code--%>

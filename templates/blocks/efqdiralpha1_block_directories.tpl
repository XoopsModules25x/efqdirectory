<table cellspacing="0">
  <tr>
    <td id="mainmenu">
    <a class="menuTop" href="<{$xoops_url}>/modules/<{$block.moddir}>/"><{$block.lang_dirmenu}></a>
  <{foreach item=directory from=$block.directories}>
    <a class="menuSub" href="<{$xoops_url}>/modules/<{$block.moddir}>/index.php?dirid=<{$directory.dirid}>"><{$directory.name}></a>
    <{foreach item=sublink from=$block.sublinks}>
      <a class="menuSub" href="<{$sublink.url}>"><{$sublink.name}></a>
    <{/foreach}>
  <{/foreach}>
    </td>
  </tr>
</table>
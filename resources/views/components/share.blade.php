<div style="display:flex;">
<style>
    svg{
        height:20px;
    }
    a.resp-sharing-button__link{
        margin-right:10px;
    }
    .all{
         width: 34px;
        padding: 2px;
        text-align: center;
    }
    .fb{
        background: #3b5998;
   
    }
    .tw{
        background:#00aced;
    }
     .pt{
        background: #cb2027;
   
    }
     .wp{
        background: #25D366;
   
    }
     .tm{
        background: #3b5998;
   
    }
    </style>
   <a class="resp-sharing-button__link" style="margin-left:5px;" href="https://facebook.com/sharer/sharer.php?u={{$url ?? ''}}" target="_blank" rel="noopener" aria-label="Share on Facebook">
      <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large">
         <div aria-hidden="true" class="all fb resp-sharing-button__icon resp-sharing-button__icon--solid">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
               <path fill="white" stroke="white" d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
            </svg>
         </div>
        
      </div>
   </a>
   <!-- Sharingbutton Twitter -->
   <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text={{$title}}&amp;url={{$url ?? ''}}" target="_blank" rel="noopener" aria-label="Share on Twitter">
      <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--large">
         <div aria-hidden="true" class="all tw resp-sharing-button__icon resp-sharing-button__icon--solid">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
               <path fill="white" stroke="white" d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/>
            </svg>
         </div>
       
      </div>
   </a>
   <!-- Sharingbutton Tumblr -->
   <a class="resp-sharing-button__link" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title={{$title}}&amp;caption={{$title}}&amp;content={{$details}}&amp;canonicalUrl={{$url ?? ''}}&amp;shareSource=tumblr_share_button" target="_blank" rel="noopener" aria-label="Share on Tumblr">
      <div class="resp-sharing-button resp-sharing-button--tumblr resp-sharing-button--large">
         <div aria-hidden="true" class="all resp-sharing-button__icon resp-sharing-button__icon--solid">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
               <path fill="white" stroke="white" d="M13.5.5v5h5v4h-5V15c0 5 3.5 4.4 6 2.8v4.4c-6.7 3.2-12 0-12-4.2V9.5h-3V6.7c1-.3 2.2-.7 3-1.3.5-.5 1-1.2 1.4-2 .3-.7.6-1.7.7-3h3.8z"/>
            </svg>
         </div>
       
      </div>
   </a>
   
  
   <!-- Sharingbutton Pinterest -->
   <a class="resp-sharing-button__link" href="https://pinterest.com/pin/create/button/?url={{$url ?? ''}}&amp;media={{$img}}&amp;description={{$details}}" target="_blank" rel="noopener" aria-label="Share on Pinterest">
      <div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--large">
         <div aria-hidden="true" class="all pt resp-sharing-button__icon resp-sharing-button__icon--solid">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
               <path fill="white" stroke="white" d="M12.14.5C5.86.5 2.7 5 2.7 8.75c0 2.27.86 4.3 2.7 5.05.3.12.57 0 .66-.33l.27-1.06c.1-.32.06-.44-.2-.73-.52-.62-.86-1.44-.86-2.6 0-3.33 2.5-6.32 6.5-6.32 3.55 0 5.5 2.17 5.5 5.07 0 3.8-1.7 7.02-4.2 7.02-1.37 0-2.4-1.14-2.07-2.54.4-1.68 1.16-3.48 1.16-4.7 0-1.07-.58-1.98-1.78-1.98-1.4 0-2.55 1.47-2.55 3.42 0 1.25.43 2.1.43 2.1l-1.7 7.2c-.5 2.13-.08 4.75-.04 5 .02.17.22.2.3.1.14-.18 1.82-2.26 2.4-4.33.16-.58.93-3.63.93-3.63.45.88 1.8 1.65 3.22 1.65 4.25 0 7.13-3.87 7.13-9.05C20.5 4.15 17.18.5 12.14.5z"/>
            </svg>
         </div>
       
      </div>
   </a>
   <a class="resp-sharing-button__link" href="whatsapp://send?text={{$title}}{{$url ?? ''}}"       data-action="share/whatsapp/share" target="_blank" rel="noopener" aria-label="Share on Pinterest">
      <div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--large">
         <div aria-hidden="true" class="all wp resp-sharing-button__icon resp-sharing-button__icon--solid">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path stroke="white" fill="white" d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
         </div>
        
      </div>
   </a>
</div>
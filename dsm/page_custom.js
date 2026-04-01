$(document).ready(function(){
  $(".page_name").keyup(function(){
    var EnUst=60;
    $("#sonuc").text('Kalan Karakter : '+EnUst);
    $(".page_name").focus();
    if(event)
    {
      var KacRakamVar=$(".page_name").val().length;
      var KalanNeKadar=EnUst-KacRakamVar;
      if(KalanNeKadar<0)
      {
        $(".page_name").val($(".page_name").val().substr(0,EnUst));
      }
      else
      {
        $("#sonuc").text('Kalan Karakter Limiti : ' +KalanNeKadar);
      }
    }
  });

  $(".en_page_name").keyup(function(){
    var EnUst=60;
    $("#en_sonuc").text('Kalan Karakter : '+EnUst);
    $(".en_page_name").focus();
    if(event)
    {
      var KacRakamVar=$(".en_page_name").val().length;
      var KalanNeKadar=EnUst-KacRakamVar;
      if(KalanNeKadar<0)
      {
        $(".en_page_name").val($(".en_page_name").val().substr(0,EnUst));
      }
      else
      {
        $("#en_sonuc").text('Kalan Karakter Limiti : ' +KalanNeKadar);
      }
    }
  });

  $(".de_page_name").keyup(function(){
    var EnUst=60;
    $("#de_sonuc").text('Kalan Karakter : '+EnUst);
    $(".de_page_name").focus();
    if(event)
    {
      var KacRakamVar=$(".de_page_name").val().length;
      var KalanNeKadar=EnUst-KacRakamVar;
      if(KalanNeKadar<0)
      {
        $(".de_page_name").val($(".de_page_name").val().substr(0,EnUst));
      }
      else
      {
        $("#de_sonuc").text('Kalan Karakter Limiti : ' +KalanNeKadar);
      }
    }
  });

  $(".ru_page_name").keyup(function(){
    var EnUst=60;
    $("#ru_sonuc").text('Kalan Karakter : '+EnUst);
    $(".ru_page_name").focus();
    if(event)
    {
      var KacRakamVar=$(".ru_page_name").val().length;
      var KalanNeKadar=EnUst-KacRakamVar;
      if(KalanNeKadar<0)
      {
        $(".ru_page_name").val($(".ru_page_name").val().substr(0,EnUst));
      }
      else
      {
        $("#ru_sonuc").text('Kalan Karakter Limiti : ' +KalanNeKadar);
      }
    }
  });

  $(".fr_page_name").keyup(function(){
    var EnUst=60;
    $("#fr_sonuc").text('Kalan Karakter : '+EnUst);
    $(".fr_page_name").focus();
    if(event)
    {
      var KacRakamVar=$(".fr_page_name").val().length;
      var KalanNeKadar=EnUst-KacRakamVar;
      if(KalanNeKadar<0)
      {
        $(".fr_page_name").val($(".fr_page_name").val().substr(0,EnUst));
      }
      else
      {
        $("#fr_sonuc").text('Kalan Karakter Limiti : ' +KalanNeKadar);
      }
    }
  });

  $(".es_page_name").keyup(function(){
    var EnUst=60;
    $("#es_sonuc").text('Kalan Karakter : '+EnUst);
    $(".es_page_name").focus();
    if(event)
    {
      var KacRakamVar=$(".es_page_name").val().length;
      var KalanNeKadar=EnUst-KacRakamVar;
      if(KalanNeKadar<0)
      {
        $(".es_page_name").val($(".es_page_name").val().substr(0,EnUst));
      }
      else
      {
        $("#es_sonuc").text('Kalan Karakter Limiti : ' +KalanNeKadar);
      }
    }
  });

  $(".it_page_name").keyup(function(){
    var EnUst=60;
    $("#it_sonuc").text('Kalan Karakter : '+EnUst);
    $(".it_page_name").focus();
    if(event)
    {
      var KacRakamVar=$(".it_page_name").val().length;
      var KalanNeKadar=EnUst-KacRakamVar;
      if(KalanNeKadar<0)
      {
        $(".it_page_name").val($(".it_page_name").val().substr(0,EnUst));
      }
      else
      {
        $("#it_sonuc").text('Kalan Karakter Limiti : ' +KalanNeKadar);
      }
    }
  });

  $(".ar_page_name").keyup(function(){
    var EnUst=60;
    $("#ar_sonuc").text('Kalan Karakter : '+EnUst);
    $(".ar_page_name").focus();
    if(event)
    {
      var KacRakamVar=$(".ar_page_name").val().length;
      var KalanNeKadar=EnUst-KacRakamVar;
      if(KalanNeKadar<0)
      {
        $(".ar_page_name").val($(".ar_page_name").val().substr(0,EnUst));
      }
      else
      {
        $("#ar_sonuc").text('Kalan Karakter Limiti : ' +KalanNeKadar);
      }
    }
  });
});

function ele(gelen)
{
  let gelenDeger = gelen.toLowerCase();
  gelenDeger = gelenDeger
  .replace('Ä', 'a')
  .replace('ä', 'a')
  .replace('Ö', 'o')
  .replace('ö', 'o')
  .replace('Ü', 'u')
  .replace('ü', 'u')
  .replace('ß', 'ss')
  .replace('ş', 's')
  .replace('ç', 'c')
  .replace('ğ', 'g')
  .replace('ö', 'o')
  .replace('ü', 'u')
  .replace('V', 'v')
  .replace('ı', 'i')
  .replace('i̇', 'i')
  .replace('*', '-')
  .replace('?', '')
  .replace('/', '-')
  .replace('+', '-')
  .replace('&', '-')
  .replace('%', '-')
  .replace('(', '-')
  .replace(')', '-')
  .replace(' - ', '-')
  .replace(' & ', '-')
  .replace('!', '-')
  .replace('!!', '-')
  .replace('!!!', '-')
  .replace('.', '-')
  .replace(' ', '-')
  .replace(',', '-');

  return gelenDeger;
}

function degerler(txt)
{
  var str = txt;
  var start = 0;
  var end = str.length - 1;
  var ver = '';
  while (end >= 0 && str[start] !== undefined)
  {  
    if(str[start] !== undefined)
    {
      ver += ele(str[start]);
      start++;
    }
  }
  return ver;
}

$(function() {    
  $('.page_name').on('keyup', function(){
    var title = $(this).val();
    $('#seo_title').val(title.trim());
  });
  $('.page_name').on('keyup', function() {
    var veri = $(this).val();
    $('#seo_link').val(degerler(veri));
  });

  $('.en_page_name').on('keyup', function(){
    var title2 = $(this).val();
    $('#en_seo_title').val(title2.trim());    
  });
  $('.en_page_name').on('keyup', function() {
    var veri2 = $(this).val();
    $('#en_seo_link').val(degerler(veri2));
  });

  $('.de_page_name').on('keyup', function(){
    var title3 = $(this).val();
    $('#de_seo_title').val(title3.trim());
  });
  $('.de_page_name').on('keyup', function() {
    var veri3 = $(this).val();
    $('#de_seo_link').val(degerler(veri3));
  });

  $('.ru_page_name').on('keyup', function(){
    var title4 = $(this).val();
    $('#ru_seo_title').val(title4.trim());
  });
  $('.ru_page_name').on('keyup', function() {
    var veri4 = $(this).val();
    $('#ru_seo_link').val(degerler(veri4));
  });

  $('.fr_page_name').on('keyup', function(){
    var title5 = $(this).val();
    $('#fr_seo_title').val(title5.trim());
  });
  $('.fr_page_name').on('keyup', function() {
    var veri4 = $(this).val();
    $('#fr_seo_link').val(degerler(veri4));
  });

  $('.es_page_name').on('keyup', function(){
    var title6 = $(this).val();
    $('#es_seo_title').val(title6.trim());
  });
  $('.es_page_name').on('keyup', function() {
    var veri4 = $(this).val();
    $('#es_seo_link').val(degerler(veri4));
  });

  $('.it_page_name').on('keyup', function(){
    var title7 = $(this).val();
    $('#it_seo_title').val(title7.trim());
  });
  $('.it_page_name').on('keyup', function() {
    var veri4 = $(this).val();
    $('#it_seo_link').val(degerler(veri4));
  });

  $('.ar_page_name').on('keyup', function(){
    var title8 = $(this).val();
    $('#ar_seo_title').val(title8.trim());
  });
  $('.ar_page_name').on('keyup', function() {
    var veri4 = $(this).val();
    $('#ar_seo_link').val(degerler(veri4));
  });

});
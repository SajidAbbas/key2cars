@extends('layout')

@section('title')
    Used Cars in Pakistan  | K2C
@endsection

    

@section('cssblock')
    <link href="{{URL ::asset('css/Used Car/custom.css') }}" media="screen" rel="stylesheet" type="text/css" />

<script>
    $('.search-fields select,.search-fields input').val('');
    function scrollIntoViewIfNeeded(selector,scroll_top){
      if(jQuery(selector).position()){
        if(jQuery(selector).position().top < jQuery(window).scrollTop()){
          //scroll up
          jQuery('html,body').animate({scrollTop: scroll_top!=undefined ? scroll_top : jQuery(selector).position().top}, 500);
        }
        else if(jQuery(selector).position().top + jQuery(selector).height() > jQuery(window).scrollTop() + (window.innerHeight || document.documentElement.clientHeight)){
          //scroll down
          jQuery('html,body').animate({scrollTop:jQuery(selector).position().top - (window.innerHeight || document.documentElement.clientHeight) + jQuery(selector).height() + 40}, 500);
        }
      }
    }
    function moreAdvanceOptions(link, fire_event){
      var all_cars = $("#used-home-adv-search-btn"), search_row= $("#search-row");
      if ($('#more_option_detail').is(':visible')) {
        $("#search-overlay").hide();
        scrollIntoViewIfNeeded(".search-classified",0);
      }
      else{
        $("#search-overlay").show();
        $('#more_option_detail').css("overflow", "visible");
      }
      $('#more_option_detail').slideToggle('slow', function() {
        if ($(this).is(':visible')) {
          if(fire_event)
            trackEvents('CarSearch', 'MoreSearchOptions', 'From - UsedHome');
          link.html("Less Search Options <i class='fa fa-caret-up'></i>").attr('style', 'margin-top: 15px !important;');
          all_cars.css("margin-top","15px");
          scrollIntoViewIfNeeded(".search-classified");
          $('#more_option_detail').css("overflow", "visible");
        } else {
          link.html("More Search Options <i class='fa fa-caret-down'></i>").attr('style', '');
          all_cars.css("margin-top","5px");
        }

      });
    }
    $(function(){
      $('#more_option').click(function(){
          moreAdvanceOptions($(this), true);
      });
      
    });

  </script>
@endsection
    
  

@section('content')
    <div class="mt10" id="main-container">
      <section >
  <div class="container">

    <div class="alert alert-danger" style="display:none" id="error_div">
      <button type="button" class="close" data-dismiss="alert">×</button>
        
    </div>

    <div class="alert alert-success" style="display:none" id="success_div">
      <button type="button" class="close" data-dismiss="alert">×</button>
        
    </div>

    <div class="alert alert-info" style="display:none">
      <button type="button" class="close" data-dismiss="alert">×</button>
      
    </div>

  </div>
</section>      
      
      <section>
  <div class="container">
    <div class="search-main mb40" style="position: relative;">
      <div id="top-search-heading" class="head">
        <h1>Find Used Cars in Pakistan</h1>
        <p>With thousand of cars,we have just the right one for you</p>
      </div>
          

<div class="" tabindex="0">
  <div id="used-cars">
    <ul class="list-unstyled search-fields search-fields3 mt20 clearfix">
      <li class="home-autocomplete-field">
        <input data-autocomplete-class="home-autocomplete autocomplete_larger" data-pw-source="car" id="home-query" name="home-query" placeholder="Car Make or Model" tabindex="2" type="text" value="" />
        <input type="hidden" name="UsedManID" id="UsedManID">
        <input type="hidden" name="UsedModelID" id="UsedModelID" onchange="updateVersion('car', $('#UsedModelID').val(), $('#UsedManID').val(), $('#UsedVersionID')); reloadChosen('#UsedVersionID');">
      </li>
      <li class="range-widget">
        <div id='pr-range-filter' tabindex='3' class="pos-rel pr-range-large">
          <span class="pr-text">Price Range</span>
          <i class="fa fa-sort-down pull-right"></i>
          <div class='pr-range' style="display:none;">
            <div class="pr-range-container ">
              <div class="pr-input-container clearfix"   >
                <div class="pr-input">
                  <input id="pr_from" name="pr_from" placeholder="Min" tabindex="4" type="text" value="" />lacs
                </div>
                <div class="pr-input">
                  <input id="pr_to" name="pr_to" placeholder="Max" tabindex="5" type="text" value="" />lacs
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="home-chzn">
        <select name="UsedCity" id="UsedCity" class="chzn-select" tabindex="1" onchange="return get_city_areas(this)">
            <option value="" >All Cities</option>
            <optgroup label="Popular Cities">
              <option value="lahore">Lahore</option>
<option value="karachi">Karachi</option>
<option value="islamabad">Islamabad</option>
<option value="rawalpindi">Rawalpindi</option>
<option value="peshawar">Peshawar</option>
            </optgroup>
            <optgroup label="Other Cities">
              <option value="abdul-hakeem">Abdul Hakeem</option>
<option value="abottabad">Abottabad</option>
<option value="adda-jahan-khan">Adda jahan khan</option>
<option value="adda-shaiwala">Adda shaiwala</option>
<option value="ahmed-pur-east">Ahmed Pur East</option>
<option value="ahmedpur-lamma">Ahmedpur Lamma</option>
<option value="akhora-khattak">Akhora khattak</option>
<option value="ali-chak">Ali chak</option>
<option value="alipur-chatta">Alipur Chatta</option>
<option value="allahabad">Allahabad</option>
<option value="amangarh">Amangarh</option>
<option value="arifwala">Arifwala</option>
<option value="attock">Attock</option>
<option value="babarloi">Babarloi</option>
<option value="babri-banda">Babri banda</option>
<option value="badin">Badin</option>
<option value="bahawal-nagar">Bahawal Nagar</option>
<option value="bahawalpur">Bahawalpur</option>
<option value="balakot">Balakot</option>
<option value="bannu">Bannu</option>
<option value="baroute">Baroute</option>
<option value="basirpur">Basirpur</option>
<option value="basti-shorekot">Basti Shorekot</option>
<option value="bat-khela">Bat khela</option>
<option value="batang--2">Batang</option>
<option value="bhai-pheru">Bhai pheru</option>
<option value="bhakkar">Bhakkar</option>
<option value="bhalwal">Bhalwal</option>
<option value="bhan-saeedabad">Bhan saeedabad</option>
<option value="bhera">Bhera</option>
<option value="bhikky">Bhikky</option>
<option value="bhimber">Bhimber</option>
<option value="bhirya-road">Bhirya road</option>
<option value="bhuawana">Bhuawana</option>
<option value="buchay-key">Buchay key</option>
<option value="burewala">Burewala</option>
<option value="chacklala">Chacklala</option>
<option value="chaininda">Chaininda</option>
<option value="chak-4-b-c">Chak 4 b c</option>
<option value="chak-46">Chak 46</option>
<option value="chak-jamal">Chak jamal</option>
<option value="chak-jhumra">Chak jhumra</option>
<option value="chak-shahzad">Chak Shahzad</option>
<option value="chaksawari">Chaksawari</option>
<option value="chakwal">Chakwal</option>
<option value="charsadda">Charsadda</option>
<option value="chashma">Chashma</option>
<option value="chawinda">Chawinda</option>
<option value="chichawatni">Chichawatni</option>
<option value="chiniot">Chiniot</option>
<option value="chishtian">Chishtian</option>
<option value="chitral">Chitral</option>
<option value="chohar-jamali">Chohar jamali</option>
<option value="choppar-hatta">Choppar hatta</option>
<option value="chowha-saidan-shah">Chowha saidan shah</option>
<option value="chowk-azam">Chowk azam</option>
<option value="chowk-mailta">Chowk mailta</option>
<option value="chowk-munda">Chowk munda</option>
<option value="chunian">Chunian</option>
<option value="d-g-khan">D.G.Khan</option>
<option value="dadakhel">Dadakhel</option>
<option value="dadu">Dadu</option>
<option value="dadyal-ak">Dadyal Ak</option>
<option value="daharki">Daharki</option>
<option value="dandot">Dandot</option>
<option value="dargai">Dargai</option>
<option value="darya-khan">Darya khan</option>
<option value="daska">Daska</option>
<option value="daud-khel">Daud khel</option>
<option value="daulatpur">Daulatpur</option>
<option value="deh-pathaan">Deh pathaan</option>
<option value="depal-pur">Depal pur</option>
<option value="dera-allah-yar">Dera Allah Yar</option>
<option value="dera-ismail-khan">Dera ismail khan</option>
<option value="dera-murad-jamali">Dera murad jamali</option>
<option value="dera-nawab-sahib">Dera nawab sahib</option>
<option value="dhatmal">Dhatmal</option>
<option value="dhoun-kal">Dhoun kal</option>
<option value="digri">Digri</option>
<option value="dijkot">Dijkot</option>
<option value="dina">Dina</option>
<option value="dinga">Dinga</option>
<option value="dir">Dir</option>
<option value="doaaba">Doaaba</option>
<option value="doltala">Doltala</option>
<option value="domeli">Domeli</option>
<option value="donga-bonga">Donga Bonga</option>
<option value="dudial">Dudial</option>
<option value="dunia-pur">Dunia Pur</option>
<option value="eminabad">Eminabad</option>
<option value="esa-khel">Esa Khel</option>
<option value="faisalabad">Faisalabad</option>
<option value="faqirwali">Faqirwali</option>
<option value="farooqabad">Farooqabad</option>
<option value="fateh-jang">Fateh Jang</option>
<option value="fateh-pur">Fateh pur</option>
<option value="feroz-walla">Feroz walla</option>
<option value="feroz-watan">Feroz watan</option>
<option value="ferozwatowan">Ferozwatowan</option>
<option value="fiza-got">Fiza got</option>
<option value="fort-abbass">Fort Abbass</option>
<option value="gadoon-amazai">Gadoon amazai</option>
<option value="gaggo-mandi">Gaggo mandi</option>
<option value="gakhar-mandi">Gakhar mandi</option>
<option value="gambat">Gambat</option>
<option value="gambet">Gambet</option>
<option value="garh-maharaja">Garh maharaja</option>
<option value="garh-more">Garh more</option>
<option value="garhi-yaseen">Garhi yaseen</option>
<option value="gari-habibullah">Gari habibullah</option>
<option value="gari-mori">Gari mori</option>
<option value="gharo">Gharo</option>
<option value="ghazi">Ghazi</option>
<option value="ghotki">Ghotki</option>
<option value="gilgit">Gilgit</option>
<option value="gohar-ghoushti">Gohar ghoushti</option>
<option value="gojar-khan">Gojar khan</option>
<option value="gojra">Gojra</option>
<option value="goth-machi">Goth Machi</option>
<option value="goular-khel">Goular khel</option>
<option value="guddu">Guddu</option>
<option value="gujar-khan">Gujar Khan</option>
<option value="gujranwala">Gujranwala</option>
<option value="gujrat">Gujrat</option>
<option value="gwadar">Gwadar</option>
<option value="hafizabad">Hafizabad</option>
<option value="hala">Hala</option>
<option value="hangu">Hangu</option>
<option value="harappa">Harappa</option>
<option value="hari-pur">Hari pur</option>
<option value="hariwala">Hariwala</option>
<option value="haroonabad">Haroonabad</option>
<option value="hasilpur">Hasilpur</option>
<option value="hassan-abdal">Hassan abdal</option>
<option value="hattar">Hattar</option>
<option value="hattian">Hattian</option>
<option value="hattian-lawrencepur">Hattian lawrencepur</option>
<option value="havali-lakhan">Havali Lakhan</option>
<option value="hawilian">Hawilian</option>
<option value="hayatabad">Hayatabad</option>
<option value="hazro">Hazro</option>
<option value="head-marala">Head marala</option>
<option value="hub">Hub</option>
<option value="hub-balochistan">Hub-Balochistan</option>
<option value="hujra-shah-mukeem">Hujra Shah Mukeem</option>
<option value="hunza">Hunza</option>
<option value="hyderabad">Hyderabad</option>
<option value="iskandarabad">Iskandarabad</option>
<option value="jacobabad">Jacobabad</option>
<option value="jahaniya">Jahaniya</option>
<option value="jaja-abasian">Jaja abasian</option>
<option value="jalalpur-jattan">Jalalpur Jattan</option>
<option value="jalalpur-pirwala">Jalalpur Pirwala</option>
<option value="jampur">Jampur</option>
<option value="jamrud-road">Jamrud road</option>
<option value="jamshoro">Jamshoro</option>
<option value="jan-pur">Jan pur</option>
<option value="jand">Jand</option>
<option value="jandanwala">Jandanwala</option>
<option value="jaranwala">Jaranwala</option>
<option value="jatlaan">Jatlaan</option>
<option value="jatoi">Jatoi</option>
<option value="jauharabad">Jauharabad</option>
<option value="jehangira">Jehangira</option>
<option value="jehlum">Jehlum</option>
<option value="jhal-magsi">Jhal Magsi</option>
<option value="jhand">Jhand</option>
<option value="jhang">Jhang</option>
<option value="jhatta-bhutta">Jhatta bhutta</option>
<option value="jhudo">Jhudo</option>
<option value="jin-pur">Jin Pur</option>
<option value="k-n-shah">K.N. Shah</option>
<option value="kabirwala">Kabirwala</option>
<option value="kacha-khooh">Kacha khooh</option>
<option value="kahuta">Kahuta</option>
<option value="kakul">Kakul</option>
<option value="kakur-town">Kakur town</option>
<option value="kala-bagh">Kala bagh</option>
<option value="kala-shah-kaku">Kala shah kaku</option>
<option value="kalaswala">Kalaswala</option>
<option value="kallar-kahar">Kallar Kahar</option>
<option value="kallar-saddiyian">Kallar Saddiyian</option>
<option value="kallur-kot">Kallur kot</option>
<option value="kamalia">Kamalia</option>
<option value="kamalia-musa">Kamalia musa</option>
<option value="kamber-ali-khan">Kamber ali khan</option>
<option value="kameer">Kameer</option>
<option value="kamoke">Kamoke</option>
<option value="kamra">Kamra</option>
<option value="kandh-kot">Kandh kot</option>
<option value="kandiaro">Kandiaro</option>
<option value="karak">Karak</option>
<option value="karoor-pacca">Karoor pacca</option>
<option value="karore-lalisan">Karore lalisan</option>
<option value="kashmir">Kashmir</option>
<option value="kashmore">Kashmore</option>
<option value="kasur">Kasur</option>
<option value="kazi-ahmed">Kazi ahmed</option>
<option value="khair-pur-mirs">Khair Pur Mirs</option>
<option value="khairpur">Khairpur</option>
<option value="khan-bela">Khan Bela</option>
<option value="khan-qah-sharif">Khan qah sharif</option>
<option value="khandabad">Khandabad</option>
<option value="khanewal">Khanewal</option>
<option value="khangarh">Khangarh</option>
<option value="khanqah-dogran">Khanqah dogran</option>
<option value="khanqah-sharif">Khanqah sharif</option>
<option value="kharian">Kharian</option>
<option value="khebar">Khebar</option>
<option value="khewra">Khewra</option>
<option value="khoski">Khoski</option>
<option value="khudian-khas">Khudian Khas</option>
<option value="khurian-wala">Khurian wala</option>
<option value="khurrianwala">Khurrianwala</option>
<option value="khushab">Khushab</option>
<option value="khushal-kot">Khushal kot</option>
<option value="khuzdar">Khuzdar</option>
<option value="klaske">Klaske</option>
<option value="kohat">Kohat</option>
<option value="kot-addu">Kot addu</option>
<option value="kot-bunglow">Kot bunglow</option>
<option value="kot-ghulam-mohd">Kot ghulam mohd</option>
<option value="kot-mithan">Kot mithan</option>
<option value="kot-momin">Kot Momin</option>
<option value="kot-radha-kishan">Kot radha kishan</option>
<option value="kotla">Kotla</option>
<option value="kotla-arab-ali-khan">Kotla arab ali khan</option>
<option value="kotla-jam">Kotla jam</option>
<option value="kotla-pathan">Kotla Pathan</option>
<option value="kotly-ak">Kotly Ak</option>
<option value="kotly-loharana">Kotly Loharana</option>
<option value="kotri">Kotri</option>
<option value="kumbh">Kumbh</option>
<option value="kundina">Kundina</option>
<option value="kunjah">Kunjah</option>
<option value="kunri">Kunri</option>
<option value="laki-marwat">Laki marwat</option>
<option value="lala-musa">Lala musa</option>
<option value="lala-rukh">Lala rukh</option>
<option value="laliah">Laliah</option>
<option value="lalshanra">Lalshanra</option>
<option value="larkana">Larkana</option>
<option value="lasbella">Lasbella</option>
<option value="lawrence-pur">Lawrence pur</option>
<option value="layyah">Layyah</option>
<option value="liaqat-pur">Liaqat Pur</option>
<option value="lodhran">Lodhran</option>
<option value="lower-dir">Lower Dir</option>
<option value="ludhan">Ludhan</option>
<option value="madina">Madina</option>
<option value="makli">Makli</option>
<option value="malakand-agency">Malakand Agency</option>
<option value="malikwal">Malikwal</option>
<option value="mamu-kunjan">Mamu kunjan</option>
<option value="mandi-bahauddin">Mandi bahauddin</option>
<option value="mandra">Mandra</option>
<option value="manga-mandi">Manga mandi</option>
<option value="mangal-sada">Mangal sada</option>
<option value="mangi">Mangi</option>
<option value="mangla">Mangla</option>
<option value="mangowal">Mangowal</option>
<option value="manoabad">Manoabad</option>
<option value="mansahra">Mansahra</option>
<option value="mardan">Mardan</option>
<option value="mari-indus">Mari indus</option>
<option value="mastoi">Mastoi</option>
<option value="matli">Matli</option>
<option value="mehar">Mehar</option>
<option value="mehmood-kot">Mehmood kot</option>
<option value="mehrabpur">Mehrabpur</option>
<option value="melsi">Melsi</option>
<option value="mian-channu">Mian Channu</option>
<option value="mian-wali">Mian Wali</option>
<option value="minchanaabad">Minchanaabad</option>
<option value="mingora">Mingora</option>
<option value="mir-ali">Mir ali</option>
<option value="miran-shah">Miran shah</option>
<option value="mirpur-a-k">Mirpur A.K.</option>
<option value="mirpur-khas">Mirpur khas</option>
<option value="mirpur-mathelo">Mirpur mathelo</option>
<option value="mithi">Mithi</option>
<option value="mitiari">Mitiari</option>
<option value="mohen-jo-daro">Mohen jo daro</option>
<option value="more-kunda">More kunda</option>
<option value="morgah">Morgah</option>
<option value="moro">Moro</option>
<option value="mubarik-pur">Mubarik pur</option>
<option value="multan">Multan</option>
<option value="muridkay">Muridkay</option>
<option value="murree">Murree</option>
<option value="musafir-khana">Musafir khana</option>
<option value="mustung">Mustung</option>
<option value="muzaffar-gargh">Muzaffar Gargh</option>
<option value="muzaffarabad">Muzaffarabad</option>
<option value="nankana-sahib">Nankana sahib</option>
<option value="narang-mandi">Narang mandi</option>
<option value="narowal">Narowal</option>
<option value="naseerabad">Naseerabad</option>
<option value="naukot">Naukot</option>
<option value="naukundi">Naukundi</option>
<option value="nawabshah">Nawabshah</option>
<option value="new-saeedabad">New saeedabad</option>
<option value="nilore">Nilore</option>
<option value="noor-kot">Noor kot</option>
<option value="nooriabad">Nooriabad</option>
<option value="noorpur-nooranga">Noorpur nooranga</option>
<option value="noshero-feroze">Noshero Feroze</option>
<option value="noudero">Noudero</option>
<option value="nowshera">Nowshera</option>
<option value="nowshera-cantt">Nowshera cantt</option>
<option value="nowshera-virka">Nowshera Virka</option>
<option value="okara">Okara</option>
<option value="other">Other</option>
<option value="padidan">Padidan</option>
<option value="pak-china-fertilizer">Pak china fertilizer</option>
<option value="pak-pattan-sharif">Pak pattan sharif</option>
<option value="panjan-kisan">Panjan kisan</option>
<option value="panjgoor">Panjgoor</option>
<option value="panno-aqil">Panno Aqil</option>
<option value="panu-aqil">Panu Aqil</option>
<option value="pasni">Pasni</option>
<option value="pasroor">Pasroor</option>
<option value="pattoki">Pattoki</option>
<option value="phagwar">Phagwar</option>
<option value="phalia">Phalia</option>
<option value="phool-nagar">Phool nagar</option>
<option value="piaro-goth">Piaro goth</option>
<option value="pind-dadan-khan">Pind Dadan Khan</option>
<option value="pindi-bhattiya">Pindi Bhattiya</option>
<option value="pindi-bhohri">Pindi bhohri</option>
<option value="pindi-gheb">Pindi gheb</option>
<option value="piplan">Piplan</option>
<option value="pir-mahal">Pir mahal</option>
<option value="pishin">Pishin</option>
<option value="qalandarabad">Qalandarabad</option>
<option value="qamber-ali-khan">Qamber Ali Khan</option>
<option value="qasba-gujrat">Qasba gujrat</option>
<option value="qazi-ahmed">Qazi ahmed</option>
<option value="qila-deedar-singh">Qila Deedar Singh</option>
<option value="quaid-abad">Quaid Abad</option>
<option value="quetta">Quetta</option>
<option value="rabwah">Rabwah</option>
<option value="rahim-yar-khan">Rahim Yar Khan</option>
<option value="rahwali">Rahwali</option>
<option value="raiwind">Raiwind</option>
<option value="rajana">Rajana</option>
<option value="rajanpur">Rajanpur</option>
<option value="rangoo">Rangoo</option>
<option value="ranipur">Ranipur</option>
<option value="rato-dero">Rato Dero</option>
<option value="rawala-kot">Rawala kot</option>
<option value="rawat">Rawat</option>
<option value="renala-khurd">Renala khurd</option>
<option value="risalpur">Risalpur</option>
<option value="rohri">Rohri</option>
<option value="sadiqabad">Sadiqabad</option>
<option value="sagri">Sagri</option>
<option value="sahiwal">Sahiwal</option>
<option value="saidu-sharif">Saidu sharif</option>
<option value="sajawal">Sajawal</option>
<option value="sakhi-sarwar">Sakhi Sarwar</option>
<option value="samanabad">Samanabad</option>
<option value="sambrial">Sambrial</option>
<option value="samma-satta">Samma satta</option>
<option value="sanghar">Sanghar</option>
<option value="sanghi">Sanghi</option>
<option value="sangla-hills">Sangla Hills</option>
<option value="sangote">Sangote</option>
<option value="sanjarpur">Sanjarpur</option>
<option value="sanjwal">Sanjwal</option>
<option value="sara-e-naurang">Sara e naurang</option>
<option value="sara-e-alamgir">Sara-E-Alamgir</option>
<option value="sargodha">Sargodha</option>
<option value="satiayana">Satiayana</option>
<option value="sawabi">Sawabi</option>
<option value="sehar-baqlas">Sehar baqlas</option>
<option value="sehwan-sharif">Sehwan Sharif</option>
<option value="sekhat">Sekhat</option>
<option value="serai-alamgir">Serai alamgir</option>
<option value="shadiwal">Shadiwal</option>
<option value="shah-kot">Shah kot</option>
<option value="shahdad-kot">Shahdad kot</option>
<option value="shahdara">Shahdara</option>
<option value="shahpur-chakar">Shahpur chakar</option>
<option value="shahpur-saddar">Shahpur Saddar</option>
<option value="shaikhupura">Shaikhupura</option>
<option value="shakargarh">Shakargarh</option>
<option value="shamsabad">Shamsabad</option>
<option value="shankiari">Shankiari</option>
<option value="shedani-sharif">Shedani sharif</option>
<option value="shehdadpur">Shehdadpur</option>
<option value="shemier">Shemier</option>
<option value="shiekhopura">Shiekhopura</option>
<option value="shikar-pur">Shikar pur</option>
<option value="shorekot-cantt">Shorekot Cantt</option>
<option value="shorkot">Shorkot</option>
<option value="shuja-abad">Shuja Abad</option>
<option value="sialkot">Sialkot</option>
<option value="sibi">Sibi</option>
<option value="sihala">Sihala</option>
<option value="sikandarabad">Sikandarabad</option>
<option value="sillanwali">Sillanwali</option>
<option value="sita-road">Sita road</option>
<option value="skardu">Skardu</option>
<option value="skrand">Skrand</option>
<option value="sohawa">Sohawa</option>
<option value="sohawa-district-daska">Sohawa district daska</option>
<option value="sukkur">Sukkur</option>
<option value="sumandari">Sumandari</option>
<option value="swat">Swat</option>
<option value="swatmingora">Swatmingora</option>
<option value="takhtbai">Takhtbai</option>
<option value="talagang">Talagang</option>
<option value="talamba">Talamba</option>
<option value="talhur">Talhur</option>
<option value="tandiliyawala">Tandiliyawala</option>
<option value="tando-adam">Tando adam</option>
<option value="tando-allah-yar">Tando Allah Yar</option>
<option value="tando-jam">Tando jam</option>
<option value="tando-muhammad-khan">Tando Muhammad Khan</option>
<option value="tank">Tank</option>
<option value="tarbela">Tarbela</option>
<option value="tarmatan">Tarmatan</option>
<option value="tatlay-wali">Tatlay Wali</option>
<option value="taunsa-sharif">Taunsa sharif</option>
<option value="taxila">Taxila</option>
<option value="tharo-shah">Tharo shah</option>
<option value="thatta">Thatta</option>
<option value="theing-jattan-more">Theing jattan more</option>
<option value="thull">Thull</option>
<option value="tibba-sultanpur">Tibba sultanpur</option>
<option value="toba-tek-singh">Toba Tek Singh</option>
<option value="topi">Topi</option>
<option value="toru">Toru</option>
<option value="tranda-muhammad-pannah">Tranda Muhammad Pannah</option>
<option value="turbat">Turbat</option>
<option value="ubaro">Ubaro</option>
<option value="ubauro">Ubauro</option>
<option value="ugoke">Ugoke</option>
<option value="ukba">Ukba</option>
<option value="umer-kot">Umer Kot</option>
<option value="upper-deval">Upper deval</option>
<option value="usta-muhammad">Usta Muhammad</option>
<option value="vehari">Vehari</option>
<option value="village-sunder">Village Sunder</option>
<option value="wah-cantt">Wah cantt</option>
<option value="wahi-hassain">Wahi hassain</option>
<option value="wahn-bachran">Wahn Bachran</option>
<option value="wan-radha-ram">Wan radha ram</option>
<option value="warah">Warah</option>
<option value="warburton">Warburton</option>
<option value="wazirabad">Wazirabad</option>
<option value="yazman-mandi">Yazman mandi</option>
<option value="zafarwal">Zafarwal</option>
<option value="zahir-peer">Zahir Peer</option>
            </optgroup>
        </select>
      </li>
    </ul>
  </div>
</div>

    
      <form accept-charset="UTF-8" action="#" class="nomargin" method="get" onsubmit="$(&#x27;#used-cars-search-btn&#x27;).click(); return false;"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <div id="more_option_detail" class="clearfix" style="display:none;">
  
  
  <ul class="search-fields search-fields3 mt30 clearfix">
    <li class="nomargin">
      <legend class="nomargin" id="city_area_heading" style='display:block !important;'>
      City Area</legend>
    </li>
    <li class="nomargin">
      <legend class="nomargin">Versions</legend>
    </li>
    <li class="nomargin">
      <legend class="nomargin">Year</legend>
    </li>
    <li class="nomargin" id="city_area_control" style='display:block !important;'>
      <select name="UsedCityArea" id="UsedCityArea" class="chzn-container chzn-container-single chzn-container-active" style='display:block !important;'>
        <option selected="selected" value="" >
        Select City Area</option>
      </select>
    </li>
    <li>
      <select name="UsedVersionID" id="UsedVersionID" class="chzn-select">
        <option value="">All Versions</option>
      </select>
    </li>
    <li>
      <select id="YearFrom" name="YearFrom" style="width: 48%;">
<option value="">From</option>
<option value="2017">2017</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
</select>

      <select class="pull-right" id="YearTo" name="YearTo" style="width: 48%;">
<option value="">To</option>
<option value="2017">2017</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
</select>

    </li>
  </ul>
  
  <ul class="search-fields search-fields3 clearfix">
    <li class="nomargin">
      <legend class="nomargin">Engine Details</legend>
    </li>
    <li class="nomargin">
      <legend class="nomargin">Engine Capacity</legend>
    </li>
    <li class="nomargin">
      <legend class="nomargin">Mileage</legend>
    </li>    
    <li>
      <select id="engine_type" name="engine_type"><option value="">All Engine Types</option>
<option value="CNG">CNG</option>
<option value="Diesel">Diesel</option>
<option value="Hybrid">Hybrid</option>
<option value="LPG">LPG</option>
<option value="Petrol">Petrol</option></select>
    </li>
    <li>
      <select name="CapacityFrom" id="CapacityFrom" style="width: 48%;">
        <option value="Less">From</option>
          <option value='600'>600 cc</option>
          <option value='800'>800 cc</option>
          <option value='1000'>1,000 cc</option>
          <option value='1200'>1,200 cc</option>
          <option value='1400'>1,400 cc</option>
          <option value='1600'>1,600 cc</option>
          <option value='1800'>1,800 cc</option>
          <option value='2000'>2,000 cc</option>
          <option value='4000'>4,000 cc</option>
          <option value='6000'>6,000 cc</option>
          <option value='8000'>8,000 cc</option>
          <option value='10000'>10,000 cc</option>
      </select>
      <select name="CapacityTo" id="CapacityTo" style="width: 48%;" class="pull-right">
        <option value="More">To</option>
          <option value='600'>600 cc</option>
          <option value='800'>800 cc</option>
          <option value='1000'>1,000 cc</option>
          <option value='1200'>1,200 cc</option>
          <option value='1400'>1,400 cc</option>
          <option value='1600'>1,600 cc</option>
          <option value='1800'>1,800 cc</option>
          <option value='2000'>2,000 cc</option>
          <option value='4000'>4,000 cc</option>
          <option value='6000'>6,000 cc</option>
          <option value='8000'>8,000 cc</option>
          <option value='10000'>10,000 cc</option>
      </select>
    </li>
    <li>
      <select name="MileageFrom" id="MileageFrom" style="width: 48%;">
        <option value="Less">From</option>
          <option value='10000'>10,000 km</option>
          <option value='20000'>20,000 km</option>
          <option value='30000'>30,000 km</option>
          <option value='40000'>40,000 km</option>
          <option value='50000'>50,000 km</option>
          <option value='60000'>60,000 km</option>
          <option value='70000'>70,000 km</option>
          <option value='80000'>80,000 km</option>
          <option value='90000'>90,000 km</option>
          <option value='100000'>100,000 km</option>
          <option value='125000'>125,000 km</option>
          <option value='150000'>150,000 km</option>
          <option value='175000'>175,000 km</option>
          <option value='200000'>200,000 km</option>
      </select>
      <select name="MileageTo" id="MileageTo" style="width: 48%;" class="pull-right">
        <option value="More">To</option>
          <option value='10000'>10,000 km</option>
          <option value='20000'>20,000 km</option>
          <option value='30000'>30,000 km</option>
          <option value='40000'>40,000 km</option>
          <option value='50000'>50,000 km</option>
          <option value='60000'>60,000 km</option>
          <option value='70000'>70,000 km</option>
          <option value='80000'>80,000 km</option>
          <option value='90000'>90,000 km</option>
          <option value='100000'>100,000 km</option>
          <option value='125000'>125,000 km</option>
          <option value='150000'>150,000 km</option>
          <option value='175000'>175,000 km</option>
          <option value='200000'>200,000 km</option>
      </select>
    </li>
  </ul>
  <legend class="nomargin">Other Details</legend>
  <ul class="search-fields search-fields3 clearfix">
    <li>
      <select id="body_type" name="body_type"><option value="">All body types</option><option value="4x4">4x4</option>
<option value="compact-hatchback">Compact hatchback</option>
<option value="compact-sedan">Compact sedan</option>
<option value="convertible">Convertible</option>
<option value="coupe">Coupe</option>
<option value="crossover">Crossover</option>
<option value="hatchback">Hatchback</option>
<option value="micro-van">Micro Van</option>
<option value="mini-van">Mini Van</option>
<option value="mini-vehicles">Mini Vehicles</option>
<option value="mpv">MPV</option>
<option value="off-road-vehicles">Off-Road Vehicles</option>
<option value="sedan">Sedan</option>
<option value="station-wagon">Station Wagon</option>
<option value="subcompact-hatchback">Subcompact hatchback</option>
<option value="suv">SUV</option>
<option value="truck">Truck</option>
<option value="van">Van</option></select>
    </li>
    <li>
      <select name="color" id="color">
        <option value="">All body colors</option>
<option value="Beige">Beige</option>
<option value="Black">Black</option>
<option value="Blue">Blue</option>
<option value="Bronze">Bronze</option>
<option value="Brown">Brown</option>
<option value="Burgundy">Burgundy</option>
<option value="Gold">Gold</option>
<option value="Green">Green</option>
<option value="Grey">Grey</option>
<option value="Indigo">Indigo</option>
<option value="Magenta">Magenta</option>
<option value="Maroon">Maroon</option>
<option value="Orange">Orange</option>
<option value="Pink">Pink</option>
<option value="Purple">Purple</option>
<option value="Red">Red</option>
<option value="Silver">Silver</option>
<option value="Turquoise">Turquoise</option>
<option value="White">White</option>
<option value="Yellow">Yellow</option>
<option value="Unlisted">Unlisted</option>
      </select>
    </li>
    <li>
      <select name="RegCity" id="RegCity" class="chzn-select">
        <option value="">Registered in any city</option>
        <option value="unregistered">Un-Registered</option>
        <optgroup label="Popular Cities">
          <option value="lahore">Lahore</option>
<option value="karachi">Karachi</option>
<option value="islamabad">Islamabad</option>
<option value="rawalpindi">Rawalpindi</option>
<option value="peshawar">Peshawar</option>
        </optgroup>
        <optgroup label="Other Cities">
          <option value="abdul-hakeem">Abdul Hakeem</option>
<option value="abottabad">Abottabad</option>
<option value="adda-jahan-khan">Adda jahan khan</option>
<option value="adda-shaiwala">Adda shaiwala</option>
<option value="ahmed-pur-east">Ahmed Pur East</option>
<option value="ahmedpur-lamma">Ahmedpur Lamma</option>
<option value="akhora-khattak">Akhora khattak</option>
<option value="ali-chak">Ali chak</option>
<option value="alipur-chatta">Alipur Chatta</option>
<option value="allahabad">Allahabad</option>
<option value="amangarh">Amangarh</option>
<option value="arifwala">Arifwala</option>
<option value="attock">Attock</option>
<option value="babarloi">Babarloi</option>
<option value="babri-banda">Babri banda</option>
<option value="badin">Badin</option>
<option value="bahawal-nagar">Bahawal Nagar</option>
<option value="bahawalpur">Bahawalpur</option>
<option value="balakot">Balakot</option>
<option value="bannu">Bannu</option>
<option value="baroute">Baroute</option>
<option value="basirpur">Basirpur</option>
<option value="basti-shorekot">Basti Shorekot</option>
<option value="bat-khela">Bat khela</option>
<option value="batang--2">Batang</option>
<option value="bhai-pheru">Bhai pheru</option>
<option value="bhakkar">Bhakkar</option>
<option value="bhalwal">Bhalwal</option>
<option value="bhan-saeedabad">Bhan saeedabad</option>
<option value="bhera">Bhera</option>
<option value="bhikky">Bhikky</option>
<option value="bhimber">Bhimber</option>
<option value="bhirya-road">Bhirya road</option>
<option value="bhuawana">Bhuawana</option>
<option value="buchay-key">Buchay key</option>
<option value="burewala">Burewala</option>
<option value="chacklala">Chacklala</option>
<option value="chaininda">Chaininda</option>
<option value="chak-4-b-c">Chak 4 b c</option>
<option value="chak-46">Chak 46</option>
<option value="chak-jamal">Chak jamal</option>
<option value="chak-jhumra">Chak jhumra</option>
<option value="chak-shahzad">Chak Shahzad</option>
<option value="chaksawari">Chaksawari</option>
<option value="chakwal">Chakwal</option>
<option value="charsadda">Charsadda</option>
<option value="chashma">Chashma</option>
<option value="chawinda">Chawinda</option>
<option value="chichawatni">Chichawatni</option>
<option value="chiniot">Chiniot</option>
<option value="chishtian">Chishtian</option>
<option value="chitral">Chitral</option>
<option value="chohar-jamali">Chohar jamali</option>
<option value="choppar-hatta">Choppar hatta</option>
<option value="chowha-saidan-shah">Chowha saidan shah</option>
<option value="chowk-azam">Chowk azam</option>
<option value="chowk-mailta">Chowk mailta</option>
<option value="chowk-munda">Chowk munda</option>
<option value="chunian">Chunian</option>
<option value="d-g-khan">D.G.Khan</option>
<option value="dadakhel">Dadakhel</option>
<option value="dadu">Dadu</option>
<option value="dadyal-ak">Dadyal Ak</option>
<option value="daharki">Daharki</option>
<option value="dandot">Dandot</option>
<option value="dargai">Dargai</option>
<option value="darya-khan">Darya khan</option>
<option value="daska">Daska</option>
<option value="daud-khel">Daud khel</option>
<option value="daulatpur">Daulatpur</option>
<option value="deh-pathaan">Deh pathaan</option>
<option value="depal-pur">Depal pur</option>
<option value="dera-allah-yar">Dera Allah Yar</option>
<option value="dera-ismail-khan">Dera ismail khan</option>
<option value="dera-murad-jamali">Dera murad jamali</option>
<option value="dera-nawab-sahib">Dera nawab sahib</option>
<option value="dhatmal">Dhatmal</option>
<option value="dhoun-kal">Dhoun kal</option>
<option value="digri">Digri</option>
<option value="dijkot">Dijkot</option>
<option value="dina">Dina</option>
<option value="dinga">Dinga</option>
<option value="dir">Dir</option>
<option value="doaaba">Doaaba</option>
<option value="doltala">Doltala</option>
<option value="domeli">Domeli</option>
<option value="donga-bonga">Donga Bonga</option>
<option value="dudial">Dudial</option>
<option value="dunia-pur">Dunia Pur</option>
<option value="eminabad">Eminabad</option>
<option value="esa-khel">Esa Khel</option>
<option value="faisalabad">Faisalabad</option>
<option value="faqirwali">Faqirwali</option>
<option value="farooqabad">Farooqabad</option>
<option value="fateh-jang">Fateh Jang</option>
<option value="fateh-pur">Fateh pur</option>
<option value="feroz-walla">Feroz walla</option>
<option value="feroz-watan">Feroz watan</option>
<option value="ferozwatowan">Ferozwatowan</option>
<option value="fiza-got">Fiza got</option>
<option value="fort-abbass">Fort Abbass</option>
<option value="gadoon-amazai">Gadoon amazai</option>
<option value="gaggo-mandi">Gaggo mandi</option>
<option value="gakhar-mandi">Gakhar mandi</option>
<option value="gambat">Gambat</option>
<option value="gambet">Gambet</option>
<option value="garh-maharaja">Garh maharaja</option>
<option value="garh-more">Garh more</option>
<option value="garhi-yaseen">Garhi yaseen</option>
<option value="gari-habibullah">Gari habibullah</option>
<option value="gari-mori">Gari mori</option>
<option value="gharo">Gharo</option>
<option value="ghazi">Ghazi</option>
<option value="ghotki">Ghotki</option>
<option value="gilgit">Gilgit</option>
<option value="gohar-ghoushti">Gohar ghoushti</option>
<option value="gojar-khan">Gojar khan</option>
<option value="gojra">Gojra</option>
<option value="goth-machi">Goth Machi</option>
<option value="goular-khel">Goular khel</option>
<option value="guddu">Guddu</option>
<option value="gujar-khan">Gujar Khan</option>
<option value="gujranwala">Gujranwala</option>
<option value="gujrat">Gujrat</option>
<option value="gwadar">Gwadar</option>
<option value="hafizabad">Hafizabad</option>
<option value="hala">Hala</option>
<option value="hangu">Hangu</option>
<option value="harappa">Harappa</option>
<option value="hari-pur">Hari pur</option>
<option value="hariwala">Hariwala</option>
<option value="haroonabad">Haroonabad</option>
<option value="hasilpur">Hasilpur</option>
<option value="hassan-abdal">Hassan abdal</option>
<option value="hattar">Hattar</option>
<option value="hattian">Hattian</option>
<option value="hattian-lawrencepur">Hattian lawrencepur</option>
<option value="havali-lakhan">Havali Lakhan</option>
<option value="hawilian">Hawilian</option>
<option value="hayatabad">Hayatabad</option>
<option value="hazro">Hazro</option>
<option value="head-marala">Head marala</option>
<option value="hub">Hub</option>
<option value="hub-balochistan">Hub-Balochistan</option>
<option value="hujra-shah-mukeem">Hujra Shah Mukeem</option>
<option value="hunza">Hunza</option>
<option value="hyderabad">Hyderabad</option>
<option value="iskandarabad">Iskandarabad</option>
<option value="jacobabad">Jacobabad</option>
<option value="jahaniya">Jahaniya</option>
<option value="jaja-abasian">Jaja abasian</option>
<option value="jalalpur-jattan">Jalalpur Jattan</option>
<option value="jalalpur-pirwala">Jalalpur Pirwala</option>
<option value="jampur">Jampur</option>
<option value="jamrud-road">Jamrud road</option>
<option value="jamshoro">Jamshoro</option>
<option value="jan-pur">Jan pur</option>
<option value="jand">Jand</option>
<option value="jandanwala">Jandanwala</option>
<option value="jaranwala">Jaranwala</option>
<option value="jatlaan">Jatlaan</option>
<option value="jatoi">Jatoi</option>
<option value="jauharabad">Jauharabad</option>
<option value="jehangira">Jehangira</option>
<option value="jehlum">Jehlum</option>
<option value="jhal-magsi">Jhal Magsi</option>
<option value="jhand">Jhand</option>
<option value="jhang">Jhang</option>
<option value="jhatta-bhutta">Jhatta bhutta</option>
<option value="jhudo">Jhudo</option>
<option value="jin-pur">Jin Pur</option>
<option value="k-n-shah">K.N. Shah</option>
<option value="kabirwala">Kabirwala</option>
<option value="kacha-khooh">Kacha khooh</option>
<option value="kahuta">Kahuta</option>
<option value="kakul">Kakul</option>
<option value="kakur-town">Kakur town</option>
<option value="kala-bagh">Kala bagh</option>
<option value="kala-shah-kaku">Kala shah kaku</option>
<option value="kalaswala">Kalaswala</option>
<option value="kallar-kahar">Kallar Kahar</option>
<option value="kallar-saddiyian">Kallar Saddiyian</option>
<option value="kallur-kot">Kallur kot</option>
<option value="kamalia">Kamalia</option>
<option value="kamalia-musa">Kamalia musa</option>
<option value="kamber-ali-khan">Kamber ali khan</option>
<option value="kameer">Kameer</option>
<option value="kamoke">Kamoke</option>
<option value="kamra">Kamra</option>
<option value="kandh-kot">Kandh kot</option>
<option value="kandiaro">Kandiaro</option>
<option value="karak">Karak</option>
<option value="karoor-pacca">Karoor pacca</option>
<option value="karore-lalisan">Karore lalisan</option>
<option value="kashmir">Kashmir</option>
<option value="kashmore">Kashmore</option>
<option value="kasur">Kasur</option>
<option value="kazi-ahmed">Kazi ahmed</option>
<option value="khair-pur-mirs">Khair Pur Mirs</option>
<option value="khairpur">Khairpur</option>
<option value="khan-bela">Khan Bela</option>
<option value="khan-qah-sharif">Khan qah sharif</option>
<option value="khandabad">Khandabad</option>
<option value="khanewal">Khanewal</option>
<option value="khangarh">Khangarh</option>
<option value="khanqah-dogran">Khanqah dogran</option>
<option value="khanqah-sharif">Khanqah sharif</option>
<option value="kharian">Kharian</option>
<option value="khebar">Khebar</option>
<option value="khewra">Khewra</option>
<option value="khoski">Khoski</option>
<option value="khudian-khas">Khudian Khas</option>
<option value="khurian-wala">Khurian wala</option>
<option value="khurrianwala">Khurrianwala</option>
<option value="khushab">Khushab</option>
<option value="khushal-kot">Khushal kot</option>
<option value="khuzdar">Khuzdar</option>
<option value="klaske">Klaske</option>
<option value="kohat">Kohat</option>
<option value="kot-addu">Kot addu</option>
<option value="kot-bunglow">Kot bunglow</option>
<option value="kot-ghulam-mohd">Kot ghulam mohd</option>
<option value="kot-mithan">Kot mithan</option>
<option value="kot-momin">Kot Momin</option>
<option value="kot-radha-kishan">Kot radha kishan</option>
<option value="kotla">Kotla</option>
<option value="kotla-arab-ali-khan">Kotla arab ali khan</option>
<option value="kotla-jam">Kotla jam</option>
<option value="kotla-pathan">Kotla Pathan</option>
<option value="kotly-ak">Kotly Ak</option>
<option value="kotly-loharana">Kotly Loharana</option>
<option value="kotri">Kotri</option>
<option value="kumbh">Kumbh</option>
<option value="kundina">Kundina</option>
<option value="kunjah">Kunjah</option>
<option value="kunri">Kunri</option>
<option value="laki-marwat">Laki marwat</option>
<option value="lala-musa">Lala musa</option>
<option value="lala-rukh">Lala rukh</option>
<option value="laliah">Laliah</option>
<option value="lalshanra">Lalshanra</option>
<option value="larkana">Larkana</option>
<option value="lasbella">Lasbella</option>
<option value="lawrence-pur">Lawrence pur</option>
<option value="layyah">Layyah</option>
<option value="liaqat-pur">Liaqat Pur</option>
<option value="lodhran">Lodhran</option>
<option value="lower-dir">Lower Dir</option>
<option value="ludhan">Ludhan</option>
<option value="madina">Madina</option>
<option value="makli">Makli</option>
<option value="malakand-agency">Malakand Agency</option>
<option value="malikwal">Malikwal</option>
<option value="mamu-kunjan">Mamu kunjan</option>
<option value="mandi-bahauddin">Mandi bahauddin</option>
<option value="mandra">Mandra</option>
<option value="manga-mandi">Manga mandi</option>
<option value="mangal-sada">Mangal sada</option>
<option value="mangi">Mangi</option>
<option value="mangla">Mangla</option>
<option value="mangowal">Mangowal</option>
<option value="manoabad">Manoabad</option>
<option value="mansahra">Mansahra</option>
<option value="mardan">Mardan</option>
<option value="mari-indus">Mari indus</option>
<option value="mastoi">Mastoi</option>
<option value="matli">Matli</option>
<option value="mehar">Mehar</option>
<option value="mehmood-kot">Mehmood kot</option>
<option value="mehrabpur">Mehrabpur</option>
<option value="melsi">Melsi</option>
<option value="mian-channu">Mian Channu</option>
<option value="mian-wali">Mian Wali</option>
<option value="minchanaabad">Minchanaabad</option>
<option value="mingora">Mingora</option>
<option value="mir-ali">Mir ali</option>
<option value="miran-shah">Miran shah</option>
<option value="mirpur-a-k">Mirpur A.K.</option>
<option value="mirpur-khas">Mirpur khas</option>
<option value="mirpur-mathelo">Mirpur mathelo</option>
<option value="mithi">Mithi</option>
<option value="mitiari">Mitiari</option>
<option value="mohen-jo-daro">Mohen jo daro</option>
<option value="more-kunda">More kunda</option>
<option value="morgah">Morgah</option>
<option value="moro">Moro</option>
<option value="mubarik-pur">Mubarik pur</option>
<option value="multan">Multan</option>
<option value="muridkay">Muridkay</option>
<option value="murree">Murree</option>
<option value="musafir-khana">Musafir khana</option>
<option value="mustung">Mustung</option>
<option value="muzaffar-gargh">Muzaffar Gargh</option>
<option value="muzaffarabad">Muzaffarabad</option>
<option value="nankana-sahib">Nankana sahib</option>
<option value="narang-mandi">Narang mandi</option>
<option value="narowal">Narowal</option>
<option value="naseerabad">Naseerabad</option>
<option value="naukot">Naukot</option>
<option value="naukundi">Naukundi</option>
<option value="nawabshah">Nawabshah</option>
<option value="new-saeedabad">New saeedabad</option>
<option value="nilore">Nilore</option>
<option value="noor-kot">Noor kot</option>
<option value="nooriabad">Nooriabad</option>
<option value="noorpur-nooranga">Noorpur nooranga</option>
<option value="noshero-feroze">Noshero Feroze</option>
<option value="noudero">Noudero</option>
<option value="nowshera">Nowshera</option>
<option value="nowshera-cantt">Nowshera cantt</option>
<option value="nowshera-virka">Nowshera Virka</option>
<option value="okara">Okara</option>
<option value="other">Other</option>
<option value="padidan">Padidan</option>
<option value="pak-china-fertilizer">Pak china fertilizer</option>
<option value="pak-pattan-sharif">Pak pattan sharif</option>
<option value="panjan-kisan">Panjan kisan</option>
<option value="panjgoor">Panjgoor</option>
<option value="panno-aqil">Panno Aqil</option>
<option value="panu-aqil">Panu Aqil</option>
<option value="pasni">Pasni</option>
<option value="pasroor">Pasroor</option>
<option value="pattoki">Pattoki</option>
<option value="phagwar">Phagwar</option>
<option value="phalia">Phalia</option>
<option value="phool-nagar">Phool nagar</option>
<option value="piaro-goth">Piaro goth</option>
<option value="pind-dadan-khan">Pind Dadan Khan</option>
<option value="pindi-bhattiya">Pindi Bhattiya</option>
<option value="pindi-bhohri">Pindi bhohri</option>
<option value="pindi-gheb">Pindi gheb</option>
<option value="piplan">Piplan</option>
<option value="pir-mahal">Pir mahal</option>
<option value="pishin">Pishin</option>
<option value="qalandarabad">Qalandarabad</option>
<option value="qamber-ali-khan">Qamber Ali Khan</option>
<option value="qasba-gujrat">Qasba gujrat</option>
<option value="qazi-ahmed">Qazi ahmed</option>
<option value="qila-deedar-singh">Qila Deedar Singh</option>
<option value="quaid-abad">Quaid Abad</option>
<option value="quetta">Quetta</option>
<option value="rabwah">Rabwah</option>
<option value="rahim-yar-khan">Rahim Yar Khan</option>
<option value="rahwali">Rahwali</option>
<option value="raiwind">Raiwind</option>
<option value="rajana">Rajana</option>
<option value="rajanpur">Rajanpur</option>
<option value="rangoo">Rangoo</option>
<option value="ranipur">Ranipur</option>
<option value="rato-dero">Rato Dero</option>
<option value="rawala-kot">Rawala kot</option>
<option value="rawat">Rawat</option>
<option value="renala-khurd">Renala khurd</option>
<option value="risalpur">Risalpur</option>
<option value="rohri">Rohri</option>
<option value="sadiqabad">Sadiqabad</option>
<option value="sagri">Sagri</option>
<option value="sahiwal">Sahiwal</option>
<option value="saidu-sharif">Saidu sharif</option>
<option value="sajawal">Sajawal</option>
<option value="sakhi-sarwar">Sakhi Sarwar</option>
<option value="samanabad">Samanabad</option>
<option value="sambrial">Sambrial</option>
<option value="samma-satta">Samma satta</option>
<option value="sanghar">Sanghar</option>
<option value="sanghi">Sanghi</option>
<option value="sangla-hills">Sangla Hills</option>
<option value="sangote">Sangote</option>
<option value="sanjarpur">Sanjarpur</option>
<option value="sanjwal">Sanjwal</option>
<option value="sara-e-naurang">Sara e naurang</option>
<option value="sara-e-alamgir">Sara-E-Alamgir</option>
<option value="sargodha">Sargodha</option>
<option value="satiayana">Satiayana</option>
<option value="sawabi">Sawabi</option>
<option value="sehar-baqlas">Sehar baqlas</option>
<option value="sehwan-sharif">Sehwan Sharif</option>
<option value="sekhat">Sekhat</option>
<option value="serai-alamgir">Serai alamgir</option>
<option value="shadiwal">Shadiwal</option>
<option value="shah-kot">Shah kot</option>
<option value="shahdad-kot">Shahdad kot</option>
<option value="shahdara">Shahdara</option>
<option value="shahpur-chakar">Shahpur chakar</option>
<option value="shahpur-saddar">Shahpur Saddar</option>
<option value="shaikhupura">Shaikhupura</option>
<option value="shakargarh">Shakargarh</option>
<option value="shamsabad">Shamsabad</option>
<option value="shankiari">Shankiari</option>
<option value="shedani-sharif">Shedani sharif</option>
<option value="shehdadpur">Shehdadpur</option>
<option value="shemier">Shemier</option>
<option value="shiekhopura">Shiekhopura</option>
<option value="shikar-pur">Shikar pur</option>
<option value="shorekot-cantt">Shorekot Cantt</option>
<option value="shorkot">Shorkot</option>
<option value="shuja-abad">Shuja Abad</option>
<option value="sialkot">Sialkot</option>
<option value="sibi">Sibi</option>
<option value="sihala">Sihala</option>
<option value="sikandarabad">Sikandarabad</option>
<option value="sillanwali">Sillanwali</option>
<option value="sita-road">Sita road</option>
<option value="skardu">Skardu</option>
<option value="skrand">Skrand</option>
<option value="sohawa">Sohawa</option>
<option value="sohawa-district-daska">Sohawa district daska</option>
<option value="sukkur">Sukkur</option>
<option value="sumandari">Sumandari</option>
<option value="swat">Swat</option>
<option value="swatmingora">Swatmingora</option>
<option value="takhtbai">Takhtbai</option>
<option value="talagang">Talagang</option>
<option value="talamba">Talamba</option>
<option value="talhur">Talhur</option>
<option value="tandiliyawala">Tandiliyawala</option>
<option value="tando-adam">Tando adam</option>
<option value="tando-allah-yar">Tando Allah Yar</option>
<option value="tando-jam">Tando jam</option>
<option value="tando-muhammad-khan">Tando Muhammad Khan</option>
<option value="tank">Tank</option>
<option value="tarbela">Tarbela</option>
<option value="tarmatan">Tarmatan</option>
<option value="tatlay-wali">Tatlay Wali</option>
<option value="taunsa-sharif">Taunsa sharif</option>
<option value="taxila">Taxila</option>
<option value="tharo-shah">Tharo shah</option>
<option value="thatta">Thatta</option>
<option value="theing-jattan-more">Theing jattan more</option>
<option value="thull">Thull</option>
<option value="tibba-sultanpur">Tibba sultanpur</option>
<option value="toba-tek-singh">Toba Tek Singh</option>
<option value="topi">Topi</option>
<option value="toru">Toru</option>
<option value="tranda-muhammad-pannah">Tranda Muhammad Pannah</option>
<option value="turbat">Turbat</option>
<option value="ubaro">Ubaro</option>
<option value="ubauro">Ubauro</option>
<option value="ugoke">Ugoke</option>
<option value="ukba">Ukba</option>
<option value="umer-kot">Umer Kot</option>
<option value="upper-deval">Upper deval</option>
<option value="usta-muhammad">Usta Muhammad</option>
<option value="vehari">Vehari</option>
<option value="village-sunder">Village Sunder</option>
<option value="wah-cantt">Wah cantt</option>
<option value="wahi-hassain">Wahi hassain</option>
<option value="wahn-bachran">Wahn Bachran</option>
<option value="wan-radha-ram">Wan radha ram</option>
<option value="warah">Warah</option>
<option value="warburton">Warburton</option>
<option value="wazirabad">Wazirabad</option>
<option value="yazman-mandi">Yazman mandi</option>
<option value="zafarwal">Zafarwal</option>
<option value="zahir-peer">Zahir Peer</option>
        </optgroup>
      </select>
    </li>
  </ul>
  <ul class="search-fields search-fields3 clearfix">
    <li>
      <select id="assembly" name="assembly"><option value="">All Assembly Types</option>
<option value="Local">Local</option>
<option value="Imported">Imported</option></select>
    </li>
    <li>
      <select id="transmission" name="transmission"><option value="">All Transmission Types</option>
<option value="Automatic">Automatic</option>
<option value="Manual">Manual</option></select>
    </li>
    <li>
      <select id="carsure" name="carsure"><option value="">Select Certification</option>
<option value="carsure">CarSure Inspected Cars</option></select>
    </li>
  </ul>
  <legend class="nomargin">Ad Properties</legend>
  <ul class="search-fields search-fields3 clearfix">
    <li>
      <select id="picture">
        <option value="">Ads with and without pictures</option>
        <option value="1">Ads with pictures only</option>
      </select>
    </li>
    <li>
      <select id="ads_type">
        <option value="">All Seller Types</option>
        <option value="2">Dealers only</option>
        <option value="1">Private sellers only</option>
      </select>
    </li>
    <li>
      <select id="featured">
        <option value="">All Ad Types</option>
        <option value="1">Featured Ads Only</option>
      </select>
    </li>
  </ul>
</div>
 
</form>

      <div class="search-functions clearfix nomargin">
        <div class="pull-left">
          <a href="javascript:void(0);" id="more_option" class="more_option">
            More Search Options <i class="fa fa-caret-down"></i>
          </a>
        </div>
        <div id="search-row" class="pull-right">
          <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="return onCarSubmit();" id="home-search-btn" tabindex="6"><i class="fa fa-search"></i> Search</button>
        </div>  
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <h2>Sell Your Car On Pakwheels</h2>
    
  <div class="row">
    <div class="col-md-10 sell-ad-with-panel">
  
      <div class="sell-your-ad mb40 well sell-blue clearfix">        
        <div class="row">
          <div class="col-md-9">
            <ul class="list-unstyled nomargin">
              <li>
                <p class="fs18">
                  <i class="fa fa-check-circle-o generic-red point"></i>
                  <strong class="title">Post an Ad for Free:</strong>
                  Post your car&#x27;s ad for free in 30 seconds.
                </p>
              </li>
              <li>
                <p class="fs18">
                  <i class="fa fa-check-circle-o generic-red point"></i>
                  <strong class="title">Thousands of genuine buyers:</strong>
                  Get authentic offers from verified buyers.
                </p>
              </li>
              <li>
                <p class="fs18">
                  <i class="fa fa-check-circle-o generic-red point"></i>
                   <strong class="title">Sell Faster:</strong>
                    Sell your car faster than others at a better price.
                  </p>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="btn-container">
              <div class="well-sell-icons">
                <span class="fa fa-car"></span>
              </div>
              <a class="btn btn-primary pos-rel" onclick= "trackEvents(&#x27;UsedCars&#x27;, &#x27;Add Car&#x27;, &#x27;From - UsedHome&#x27;);" href="#">Sell Your Car</a>
            </div>
          </div>        
        </div>
      </div>

  

    </div><!-- col-md-10 sell-ad-with-panel -->

    <div class="col-md-2">
      <div class="well p10 text-center">
        <div class="suzuki-certified-logo-lg mt15 mb5"></div>
        <a class="learn-more mt20 mb10 show" href="#" style="font-size: 12px !important; padding: 4px 0px;">View Certified Cars</a>
      </div>
    </div>

  </div><!-- row -->

  
  </div>
</section>

  <section>
    <div class="container">
      <h2>
        Featured Used Cars for Sale
        <div class="btn-group btn-group-sm bx-pager-btn pull-right">
          <span class="slider-prev btn"></span>
          <span class="slider-next btn"></span>
        </div>
      </h2>

      <div id="carSliderWrapper">
        <div id="slider_container" class="two-row-slider clearfix" dir="ltr">
          <div id="slider" style="max-height: 290px; overflow: hidden;">
              <ul class="list-unstyled recent-vehicle-list extended car-featured-used-home car-slide-0">
      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="#">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Honda N Wgn G A Package 2014 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="#" rel="nofollow">Honda N Wgn 2014</a></h3>
            <div class="generic-green">
              PKR 1,300,000
            </div>
            <div class="generic-grey">Islamabad</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="#">
                  <img alt="New" class="lazy-car-slider pic" data-original="https://cache2.pakwheels.com/ad_pictures/1727/Slide_suzuki-cultus-vxri-2-2011-17278249.jpg" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Suzuki Cultus VXRi 2011 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="#" rel="nofollow">Suzuki Cultus 2011</a></h3>
            <div class="generic-green">
              PKR 690,000
            </div>
            <div class="generic-grey">Lahore</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="#">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="#" title="Honda Civic Oriel 1.8 i-VTEC CVT 2017 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="#" rel="nofollow">Honda Civic 2017</a></h3>
            <div class="generic-green">
              PKR 2,955,000
            </div>
            <div class="generic-grey">Islamabad</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="#">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Toyota Vitz Jewela 1.0 2013 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="#" rel="nofollow">Toyota Vitz 2013</a></h3>
            <div class="generic-green">
              PKR 1,570,000
            </div>
            <div class="generic-grey">Islamabad</div>
          </div>
        </span>
</li>  </ul>
  <ul class="list-unstyled recent-vehicle-list extended car-featured-used-home car-slide-1">
      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="#">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Toyota Prius Alpha S 2013 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="#" rel="nofollow">Toyota Prius Alpha 2013</a></h3>
            <div class="generic-green">
              PKR 2,200,000
            </div>
            <div class="generic-grey">Lahore</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="#">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Toyota Aqua G LED Soft Leather Selection  2015 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="#" rel="nofollow">Toyota Aqua 2015</a></h3>
            <div class="generic-green">
              PKR 2,050,000
            </div>
            <div class="generic-grey">Lahore</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="#">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Toyota Passo X 2014 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="toyota-passo-2014-for-sale-in-islamabad-2142010.html" rel="nofollow">Toyota Passo 2014</a></h3>
            <div class="generic-green">
              PKR 1,390,000
            </div>
            <div class="generic-grey">Islamabad</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="suzuki-every-2013-for-sale-in-lahore-2232549.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Suzuki Every PA 2013 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="suzuki-every-2013-for-sale-in-lahore-2232549.html" rel="nofollow">Suzuki Every 2013</a></h3>
            <div class="generic-green">
              PKR 1,000,000
            </div>
            <div class="generic-grey">Lahore</div>
          </div>
        </span>
</li>  </ul>
  <ul class="list-unstyled recent-vehicle-list extended car-featured-used-home car-slide-2">
      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="toyota-prius-2011-for-sale-in-karachi-2216545.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Toyota Prius S 1.8 2011 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="toyota-prius-2011-for-sale-in-karachi-2216545.html" rel="nofollow">Toyota Prius 2011</a></h3>
            <div class="generic-green">
              Call
            </div>
            <div class="generic-grey">Karachi</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="honda-civic-2017-for-sale-in-islamabad-2130050.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Honda Civic Oriel 1.8 i-VTEC CVT 2017 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="honda-civic-2017-for-sale-in-islamabad-2130050.html" rel="nofollow">Honda Civic 2017</a></h3>
            <div class="generic-green">
              Call
            </div>
            <div class="generic-grey">Islamabad</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="toyota-vitz-2014-for-sale-in-karachi-2191277.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="#" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Toyota Vitz F 1.0 2014 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="toyota-vitz-2014-for-sale-in-karachi-2191277.html" rel="nofollow">Toyota Vitz 2014</a></h3>
            <div class="generic-green">
              PKR 1,600,000
            </div>
            <div class="generic-grey">Karachi</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="mitsubishi-ek-wagon-2014-for-sale-in-karachi-2183537.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Mitsubishi Ek Wagon GS Marble Edition 2014 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="mitsubishi-ek-wagon-2014-for-sale-in-karachi-2183537.html" rel="nofollow">Mitsubishi Ek Wagon 2014</a></h3>
            <div class="generic-green">
              Call
            </div>
            <div class="generic-grey">Karachi</div>
          </div>
        </span>
</li>  </ul>
  <ul class="list-unstyled recent-vehicle-list extended car-featured-used-home car-slide-3">
      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="toyota-hilux-2011-for-sale-in-karachi-2180373.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="https://cache4.pakwheels.com/ad_pictures/1710/Slide_toyota-hilux-d-4d-2011-17101302.jpg" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Toyota Hilux D-4D 2011 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="toyota-hilux-2011-for-sale-in-karachi-2180373.html" rel="nofollow">Toyota Hilux 2011</a></h3>
            <div class="generic-green">
              PKR 2,500,000
            </div>
            <div class="generic-grey">Karachi</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="suzuki-mehran-2011-for-sale-in-karachi-2235652.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Suzuki Mehran VX 2011 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="suzuki-mehran-2011-for-sale-in-karachi-2235652.html" rel="nofollow">Suzuki Mehran 2011</a></h3>
            <div class="generic-green">
              PKR 440,000
            </div>
            <div class="generic-grey">Karachi</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="honda-civic-2011-for-sale-in-rawalpindi-2240765.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="https://cache3.pakwheels.com/ad_pictures/1777/Slide_honda-civic-vti-1-8-i-vtec-2011-17779069.jpg" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Honda Civic VTi 1.8 i-VTEC 2011 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="honda-civic-2011-for-sale-in-rawalpindi-2240765.html" rel="nofollow">Honda Civic 2011</a></h3>
            <div class="generic-green">
              Call
            </div>
            <div class="generic-grey">Rawalpindi</div>
          </div>
        </span>
</li>      <li class="col-md-3">
        <span>
          <div class="img-box">
              <div class="featured-ribbon">
                <i class="fa fa-star"></i>
                FEATURED
              </div>

              
              <div class="img-content img-valign">
                <a href="toyota-hiace-2012-for-sale-in-lahore-2214891.html">
                  <img alt="New" class="lazy-car-slider pic" data-original="https://cache1.pakwheels.com/ad_pictures/1748/Slide_toyota-hiace-commuter-std-roof-15-seater-2012-17488378.jpg" rel="nofollow" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Toyota Hiace DX 2012 for Sale" />
                </a>
                
              </div>

          </div>
          <div class="recent-vehicle-list-content">
            <h3 class="nomargin truncate"><a href="toyota-hiace-2012-for-sale-in-lahore-2214891.html" rel="nofollow">Toyota Hiace 2012</a></h3>
            <div class="generic-green">
              PKR 3,150,000
            </div>
            <div class="generic-grey">Lahore</div>
          </div>
        </span>
</li>  </ul>

          </div>
        </div>
        <div id="type-featured-used-home" class="clear-link">
          <a href="search/-/featured_1/index.html" class="more-link" rel="nofollow">View all featured used cars</a>
        </div>
      </div>
    </div>
  </section>


<section>
  <div class="container">
    
    <h2>CarSure Inspection</h2>
    <div class="well carsure-marketing-banner nomargin mb40">
      <div class="row text-center">
        <div class="col-md-6 left-panel">
          <h3 class="mb15 mt25 fs18">Never buy a Used Car without <span class="carsure-logo-medium"></span></h3>
          <p class="mb20">Our CarSure experts inspect the car on over 200 checkpoints so you get complete satisfaction and peace of mind before buying.</p>
          <a href="../carsure/new.html" id="carsure-request-usedcar" class="fs14 btn btn-info mb15">Schedule CarSure Inspection</a><br/>
          <a href="../products/carsure.html" id="certify-car-used-car" class="fs14">Learn More <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="col-md-6">
          <img alt="CarSure Checklist Points" src="images/carsure.png" />
        </div>
      </div>
    </div>

  </div>
</section>

<section>
  <div class="container">
    <h2>
      Popular Used Cars by Makes &amp; Models
        <div class="btn-group bx-pager-btn">
          <span class="slider1-prev btn"></span>
          <span class="slider1-next btn"></span>
        </div>
    </h2>
    <div class="well clearfix" id="browse-by-brand_used-cars" dir="ltr">
      <div id="slider1" style="overflow: hidden;">
            <ul class="vehicle-model-0">
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="toyota/33.html" id="amk_toyota" title="Toyota Cars in Pakistan">
                    <div class="pw-make-80 toyota"></div>
                    <h3 class="nomargin">Toyota</h3>

                  </a>
                </li>
                  <li><a  href="toyota-corolla/688.html" id="amd_Toyota,Corolla" title="Toyota Corolla For Sale in Pakistan">Corolla</a></li>
                  <li><a  href="toyota-vitz/781.html" id="amd_Toyota,Vitz" title="Toyota Vitz For Sale in Pakistan">Vitz</a></li>
                  <li><a  href="toyota-aqua/38077.html" id="amd_Toyota,Aqua" title="Toyota Aqua For Sale in Pakistan">Aqua</a></li>
                  <li><a  href="toyota-prado/38678.html" id="amd_Toyota,Prado" title="Toyota Prado For Sale in Pakistan">Prado</a></li>
                  <li><a  href="toyota-prius/836.html" id="amd_Toyota,Prius" title="Toyota Prius For Sale in Pakistan">Prius</a></li>
                  <li><a  href="toyota-passo/803.html" id="amd_Toyota,Passo" title="Toyota Passo For Sale in Pakistan">Passo</a></li>
                  <li><a  href="toyota-land-cruiser/651.html" id="amd_Toyota,Land Cruiser" title="Toyota Land Cruiser For Sale in Pakistan">Land Cruiser</a></li>
                  <li><a  href="toyota-hilux/789.html" id="amd_Toyota,Hilux" title="Toyota Hilux For Sale in Pakistan">Hilux</a></li>
                  <li><a  href="toyota-corolla-axio/843.html" id="amd_Toyota,Corolla Axio" title="Toyota Corolla Axio For Sale in Pakistan">Corolla Axio</a></li>
                  <li><a  href="toyota-premio/779.html" id="amd_Toyota,Premio" title="Toyota Premio For Sale in Pakistan">Premio</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="suzuki/32.html" id="amk_suzuki" title="Suzuki Cars in Pakistan">
                    <div class="pw-make-80 suzuki"></div>
                    <h3 class="nomargin">Suzuki</h3>

                  </a>
                </li>
                  <li><a  href="suzuki-mehran/661.html" id="amd_Suzuki,Mehran" title="Suzuki Mehran For Sale in Pakistan">Mehran</a></li>
                  <li><a  href="suzuki-cultus/660.html" id="amd_Suzuki,Cultus" title="Suzuki Cultus For Sale in Pakistan">Cultus</a></li>
                  <li><a  href="suzuki-alto/658.html" id="amd_Suzuki,Alto" title="Suzuki Alto For Sale in Pakistan">Alto</a></li>
                  <li><a  href="suzuki-bolan/693.html" id="amd_Suzuki,Bolan" title="Suzuki Bolan For Sale in Pakistan">Bolan</a></li>
                  <li><a  href="suzuki-khyber/698.html" id="amd_Suzuki,Khyber" title="Suzuki Khyber For Sale in Pakistan">Khyber</a></li>
                  <li><a  href="suzuki-wagon-r/801.html" id="amd_Suzuki,Wagon R" title="Suzuki Wagon R For Sale in Pakistan">Wagon R</a></li>
                  <li><a  href="suzuki-every/878.html" id="amd_Suzuki,Every" title="Suzuki Every For Sale in Pakistan">Every</a></li>
                  <li><a  href="suzuki-swift/778.html" id="amd_Suzuki,Swift" title="Suzuki Swift For Sale in Pakistan">Swift</a></li>
                  <li><a  href="suzuki-baleno/659.html" id="amd_Suzuki,Baleno" title="Suzuki Baleno For Sale in Pakistan">Baleno</a></li>
                  <li><a  href="suzuki-margalla/717.html" id="amd_Suzuki,Margalla" title="Suzuki Margalla For Sale in Pakistan">Margalla</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="honda/14.html" id="amk_honda" title="Honda Cars in Pakistan">
                    <div class="pw-make-80 honda"></div>
                    <h3 class="nomargin">Honda</h3>

                  </a>
                </li>
                  <li><a  href="honda-civic/642.html" id="amd_Honda,Civic" title="Honda Civic For Sale in Pakistan">Civic</a></li>
                  <li><a  href="honda-city/664.html" id="amd_Honda,City" title="Honda City For Sale in Pakistan">City</a></li>
                  <li><a  href="honda-vezel/57545.html" id="amd_Honda,Vezel" title="Honda Vezel For Sale in Pakistan">Vezel</a></li>
                  <li><a  href="honda-n-wgn/61510.html" id="amd_Honda,N Wgn" title="Honda N Wgn For Sale in Pakistan">N Wgn</a></li>
                  <li><a  href="honda-accord/644.html" id="amd_Honda,Accord" title="Honda Accord For Sale in Pakistan">Accord</a></li>
                  <li><a  href="honda-fit-hybrid/952.html" id="amd_Honda,Fit Hybrid" title="Honda Fit Hybrid For Sale in Pakistan">Fit Hybrid</a></li>
                  <li><a  href="honda-br-v/108800.html" id="amd_Honda,BR-V" title="Honda BR-V For Sale in Pakistan">BR-V</a></li>
                  <li><a  href="honda-none/956.html" id="amd_Honda,N One" title="Honda N One For Sale in Pakistan">N One</a></li>
                  <li><a  href="honda-freed/902.html" id="amd_Honda,Freed" title="Honda Freed For Sale in Pakistan">Freed</a></li>
                  <li><a  href="honda-life/812.html" id="amd_Honda,Life" title="Honda Life For Sale in Pakistan">Life</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="daihatsu/12.html" id="amk_daihatsu" title="Daihatsu Cars in Pakistan">
                    <div class="pw-make-80 daihatsu"></div>
                    <h3 class="nomargin">Daihatsu</h3>

                  </a>
                </li>
                  <li><a  href="daihatsu-mira/788.html" id="amd_Daihatsu,Mira" title="Daihatsu Mira For Sale in Pakistan">Mira</a></li>
                  <li><a  href="daihatsu-cuore/665.html" id="amd_Daihatsu,Cuore" title="Daihatsu Cuore For Sale in Pakistan">Cuore</a></li>
                  <li><a  href="daihatsu-move/800.html" id="amd_Daihatsu,Move" title="Daihatsu Move For Sale in Pakistan">Move</a></li>
                  <li><a  href="daihatsu-hijet-van/857.html" id="amd_Daihatsu,Hijet" title="Daihatsu Hijet For Sale in Pakistan">Hijet</a></li>
                  <li><a  href="daihatsu-charade/716.html" id="amd_Daihatsu,Charade" title="Daihatsu Charade For Sale in Pakistan">Charade</a></li>
                  <li><a  href="daihatsu-move-custom/974.html" id="amd_Daihatsu,Move Custom" title="Daihatsu Move Custom For Sale in Pakistan">Move Custom</a></li>
                  <li><a  href="daihatsu-copen/848.html" id="amd_Daihatsu,Copen" title="Daihatsu Copen For Sale in Pakistan">Copen</a></li>
                  <li><a  href="daihatsu-atrai-wagon/940.html" id="amd_Daihatsu,Atrai Wagon" title="Daihatsu Atrai Wagon For Sale in Pakistan">Atrai Wagon</a></li>
                  <li><a  href="daihatsu-terios-kid/794.html" id="amd_Daihatsu,Terios Kid" title="Daihatsu Terios Kid For Sale in Pakistan">Terios Kid</a></li>
                  <li><a  href="daihatsu-boon/861.html" id="amd_Daihatsu,Boon" title="Daihatsu Boon For Sale in Pakistan">Boon</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="nissan/26.html" id="amk_nissan" title="Nissan Cars in Pakistan">
                    <div class="pw-make-80 nissan"></div>
                    <h3 class="nomargin">Nissan</h3>

                  </a>
                </li>
                  <li><a  href="nissan-dayz/57410.html" id="amd_Nissan,Dayz" title="Nissan Dayz For Sale in Pakistan">Dayz</a></li>
                  <li><a  href="nissan-sunny/710.html" id="amd_Nissan,Sunny" title="Nissan Sunny For Sale in Pakistan">Sunny</a></li>
                  <li><a  href="nissan-dayz-highway-star/58494.html" id="amd_Nissan,Dayz Highway Star" title="Nissan Dayz Highway Star For Sale in Pakistan">Dayz Highway Star</a></li>
                  <li><a  href="nissan-clipper/874.html" id="amd_Nissan,Clipper" title="Nissan Clipper For Sale in Pakistan">Clipper</a></li>
                  <li><a  href="nissan-juke/887.html" id="amd_Nissan,Juke" title="Nissan Juke For Sale in Pakistan">Juke</a></li>
                  <li><a  href="nissan-moco/886.html" id="amd_Nissan,Moco" title="Nissan Moco For Sale in Pakistan">Moco</a></li>
                  <li><a  href="nissan-ad-van/855.html" id="amd_Nissan,AD Van" title="Nissan AD Van For Sale in Pakistan">AD Van</a></li>
                  <li><a  href="nissan-march/793.html" id="amd_Nissan,March" title="Nissan March For Sale in Pakistan">March</a></li>
                  <li><a  href="nissan-otti/875.html" id="amd_Nissan,Otti" title="Nissan Otti For Sale in Pakistan">Otti</a></li>
                  <li><a  href="nissan-roox/29016.html" id="amd_Nissan,Roox" title="Nissan Roox For Sale in Pakistan">Roox</a></li>
              </ul>
            </ul>
            <ul class="vehicle-model-1">
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="mitsubishi/25.html" id="amk_mitsubishi" title="Mitsubishi Cars in Pakistan">
                    <div class="pw-make-80 mitsubishi"></div>
                    <h3 class="nomargin">Mitsubishi</h3>

                  </a>
                </li>
                  <li><a  href="mitsubishi-pajero/703.html" id="amd_Mitsubishi,Pajero" title="Mitsubishi Pajero For Sale in Pakistan">Pajero</a></li>
                  <li><a  href="mitsubishi-lancer/704.html" id="amd_Mitsubishi,Lancer" title="Mitsubishi Lancer For Sale in Pakistan">Lancer</a></li>
                  <li><a  href="mitsubishi-ek-wagon/856.html" id="amd_Mitsubishi,Ek Wagon" title="Mitsubishi Ek Wagon For Sale in Pakistan">Ek Wagon</a></li>
                  <li><a  href="mitsubishi-mirage/988.html" id="amd_Mitsubishi,Mirage" title="Mitsubishi Mirage For Sale in Pakistan">Mirage</a></li>
                  <li><a  href="mitsubishi-pajero-mini/786.html" id="amd_Mitsubishi,Pajero Mini" title="Mitsubishi Pajero Mini For Sale in Pakistan">Pajero Mini</a></li>
                  <li><a  href="mitsubishi-minicab-bravo/933.html" id="amd_Mitsubishi,Minicab Bravo" title="Mitsubishi Minicab Bravo For Sale in Pakistan">Minicab Bravo</a></li>
                  <li><a  href="mitsubishi-ek-custom/63959.html" id="amd_Mitsubishi,EK Custom" title="Mitsubishi EK Custom For Sale in Pakistan">EK Custom</a></li>
                  <li><a  href="mitsubishi-galant/702.html" id="amd_Mitsubishi,Galant" title="Mitsubishi Galant For Sale in Pakistan">Galant</a></li>
                  <li><a  href="mitsubishi-minica/891.html" id="amd_Mitsubishi,Minica" title="Mitsubishi Minica For Sale in Pakistan">Minica</a></li>
                  <li><a  href="mitsubishi-evo/811.html" id="amd_Mitsubishi,Lancer Evolution" title="Mitsubishi Lancer Evolution For Sale in Pakistan">Lancer Evolution</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="mercedes-benz/23.html" id="amk_mercedes-benz" title="Mercedes Benz Cars in Pakistan">
                    <div class="pw-make-80 mercedes-benz"></div>
                    <h3 class="nomargin">Mercedes Benz</h3>

                  </a>
                </li>
                  <li><a  href="mercedes-benz-c-class/745.html" id="amd_Mercedes Benz,C Class" title="Mercedes Benz C Class For Sale in Pakistan">C Class</a></li>
                  <li><a  href="mercedes-benz-e-class/744.html" id="amd_Mercedes Benz,E Class" title="Mercedes Benz E Class For Sale in Pakistan">E Class</a></li>
                  <li><a  href="mercedes-benz-s-class/743.html" id="amd_Mercedes Benz,S Class" title="Mercedes Benz S Class For Sale in Pakistan">S Class</a></li>
                  <li><a  href="mercedes-benz-200d/61575.html" id="amd_Mercedes Benz,200 D" title="Mercedes Benz 200 D For Sale in Pakistan">200 D</a></li>
                  <li><a  href="mercedes-benz-e-series/39969.html" id="amd_Mercedes Benz,E Series" title="Mercedes Benz E Series For Sale in Pakistan">E Series</a></li>
                  <li><a  href="mercedes-benz-cla-class/61396.html" id="amd_Mercedes Benz,CLA Class" title="Mercedes Benz CLA Class For Sale in Pakistan">CLA Class</a></li>
                  <li><a  href="mercedes-benz-clk-class/746.html" id="amd_Mercedes Benz,CLK Class" title="Mercedes Benz CLK Class For Sale in Pakistan">CLK Class</a></li>
                  <li><a  href="mercedes-benz-a-class/747.html" id="amd_Mercedes Benz,A Class" title="Mercedes Benz A Class For Sale in Pakistan">A Class</a></li>
                  <li><a  href="mercedes-benz-slk/808.html" id="amd_Mercedes Benz,SLK Class" title="Mercedes Benz SLK Class For Sale in Pakistan">SLK Class</a></li>
                  <li><a  href="mercedes-benz-250d/57890.html" id="amd_Mercedes Benz,250 D" title="Mercedes Benz 250 D For Sale in Pakistan">250 D</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="hyundai/15.html" id="amk_hyundai" title="Hyundai Cars in Pakistan">
                    <div class="pw-make-80 hyundai"></div>
                    <h3 class="nomargin">Hyundai</h3>

                  </a>
                </li>
                  <li><a  href="hyundai-santro/668.html" id="amd_Hyundai,Santro" title="Hyundai Santro For Sale in Pakistan">Santro</a></li>
                  <li><a  href="hyundai-shehzore/696.html" id="amd_Hyundai,Shehzore" title="Hyundai Shehzore For Sale in Pakistan">Shehzore</a></li>
                  <li><a  href="hyundai-excel/695.html" id="amd_Hyundai,Excel" title="Hyundai Excel For Sale in Pakistan">Excel</a></li>
                  <li><a  href="hyundai-coupe/815.html" id="amd_Hyundai,Coupe" title="Hyundai Coupe For Sale in Pakistan">Coupe</a></li>
                  <li><a  href="hyundai-sonata/818.html" id="amd_Hyundai,Sonata" title="Hyundai Sonata For Sale in Pakistan">Sonata</a></li>
                  <li><a  href="hyundai-terracan/40651.html" id="amd_Hyundai,Terracan" title="Hyundai Terracan For Sale in Pakistan">Terracan</a></li>
                  <li><a  href="hyundai-any-model-130/694.html" id="amd_Hyundai,Other" title="Hyundai Other For Sale in Pakistan">Other</a></li>
                  <li><a  href="hyundai-elantra/61596.html" id="amd_Hyundai,Elantra" title="Hyundai Elantra For Sale in Pakistan">Elantra</a></li>
                  <li><a  href="hyundai-grace/29761.html" id="amd_Hyundai,Grace" title="Hyundai Grace For Sale in Pakistan">Grace</a></li>
                  <li><a  href="hyundai-tucson/152344.html" id="amd_Hyundai,Tucson" title="Hyundai Tucson For Sale in Pakistan">Tucson</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="mazda/22.html" id="amk_mazda" title="Mazda Cars in Pakistan">
                    <div class="pw-make-80 mazda"></div>
                    <h3 class="nomargin">Mazda</h3>

                  </a>
                </li>
                  <li><a  href="mazda-scrum/24889.html" id="amd_Mazda,Scrum" title="Mazda Scrum For Sale in Pakistan">Scrum</a></li>
                  <li><a  href="mazda-rx-8/759.html" id="amd_Mazda,RX8" title="Mazda RX8 For Sale in Pakistan">RX8</a></li>
                  <li><a  href="mazda-carol/927.html" id="amd_Mazda,Carol" title="Mazda Carol For Sale in Pakistan">Carol</a></li>
                  <li><a  href="mazda-flair/55448.html" id="amd_Mazda,Flair" title="Mazda Flair For Sale in Pakistan">Flair</a></li>
                  <li><a  href="mazda-scrum-wagon/35445.html" id="amd_Mazda,Scrum Wagon" title="Mazda Scrum Wagon For Sale in Pakistan">Scrum Wagon</a></li>
                  <li><a  href="mazda-carol-eco/27648.html" id="amd_Mazda,Carol Eco" title="Mazda Carol Eco For Sale in Pakistan">Carol Eco</a></li>
                  <li><a  href="mazda-323/706.html" id="amd_Mazda,323" title="Mazda 323 For Sale in Pakistan">323</a></li>
                  <li><a  href="mazda-flair-wagon/61126.html" id="amd_Mazda,Flair Wagon" title="Mazda Flair Wagon For Sale in Pakistan">Flair Wagon</a></li>
                  <li><a  href="mazda-axela/869.html" id="amd_Mazda,Axela" title="Mazda Axela For Sale in Pakistan">Axela</a></li>
                  <li><a  href="mazda-626/707.html" id="amd_Mazda,626" title="Mazda 626 For Sale in Pakistan">626</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="bmw/8.html" id="amk_bmw" title="BMW Cars in Pakistan">
                    <div class="pw-make-80 bmw"></div>
                    <h3 class="nomargin">BMW</h3>

                  </a>
                </li>
                  <li><a  href="bmw-7-series/738.html" id="amd_BMW,7 Series" title="BMW 7 Series For Sale in Pakistan">7 Series</a></li>
                  <li><a  href="bmw-5-series/737.html" id="amd_BMW,5 Series" title="BMW 5 Series For Sale in Pakistan">5 Series</a></li>
                  <li><a  href="bmw-3-series/736.html" id="amd_BMW,3 Series" title="BMW 3 Series For Sale in Pakistan">3 Series</a></li>
                  <li><a  href="bmw-x1-series/101279.html" id="amd_BMW,X1 Series" title="BMW X1 Series For Sale in Pakistan">X1 Series</a></li>
                  <li><a  href="bmw-x5-series/913.html" id="amd_BMW,X5 Series" title="BMW X5 Series For Sale in Pakistan">X5 Series</a></li>
                  <li><a  href="bmw-x3-series/49662.html" id="amd_BMW,X3 Series" title="BMW X3 Series For Sale in Pakistan">X3 Series</a></li>
                  <li><a  href="bmw-6-series/739.html" id="amd_BMW,6 Series" title="BMW 6 Series For Sale in Pakistan">6 Series</a></li>
                  <li><a  href="bmw-i8/106491.html" id="amd_BMW,i8" title="BMW i8 For Sale in Pakistan">i8</a></li>
                  <li><a  href="bmw-1-series/912.html" id="amd_BMW,1 Series" title="BMW 1 Series For Sale in Pakistan">1 Series</a></li>
                  <li><a  href="bmw-any-model/669.html" id="amd_BMW,Other" title="BMW Other For Sale in Pakistan">Other</a></li>
              </ul>
            </ul>
            <ul class="vehicle-model-2">
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="kia/19.html" id="amk_kia" title="KIA Cars in Pakistan">
                    <div class="pw-make-80 kia"></div>
                    <h3 class="nomargin">KIA</h3>

                  </a>
                </li>
                  <li><a  href="kia-classic/666.html" id="amd_KIA,Classic" title="KIA Classic For Sale in Pakistan">Classic</a></li>
                  <li><a  href="kia-sportage/715.html" id="amd_KIA,Sportage" title="KIA Sportage For Sale in Pakistan">Sportage</a></li>
                  <li><a  href="kia-pride/697.html" id="amd_KIA,Pride" title="KIA Pride For Sale in Pakistan">Pride</a></li>
                  <li><a  href="kia-spectra/667.html" id="amd_KIA,Spectra" title="KIA Spectra For Sale in Pakistan">Spectra</a></li>
                  <li><a  href="kia-spectra-wing/129242.html" id="amd_KIA,Spectra Wing" title="KIA Spectra Wing For Sale in Pakistan">Spectra Wing</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="daewoo/11.html" id="amk_daewoo" title="Daewoo Cars in Pakistan">
                    <div class="pw-make-80 daewoo"></div>
                    <h3 class="nomargin">Daewoo</h3>

                  </a>
                </li>
                  <li><a  href="daewoo-racer/714.html" id="amd_Daewoo,Racer" title="Daewoo Racer For Sale in Pakistan">Racer</a></li>
                  <li><a  href="daewoo-cielo/996.html" id="amd_Daewoo,Cielo" title="Daewoo Cielo For Sale in Pakistan">Cielo</a></li>
                  <li><a  href="daewoo-any-model-123/689.html" id="amd_Daewoo,Other" title="Daewoo Other For Sale in Pakistan">Other</a></li>
                  <li><a  href="daewoo-matiz2/38295.html" id="amd_Daewoo,Matiz" title="Daewoo Matiz For Sale in Pakistan">Matiz</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="lexus/21.html" id="amk_lexus" title="Lexus Cars in Pakistan">
                    <div class="pw-make-80 lexus"></div>
                    <h3 class="nomargin">Lexus</h3>

                  </a>
                </li>
                  <li><a  href="lexus-rx-series/742.html" id="amd_Lexus,RX Series" title="Lexus RX Series For Sale in Pakistan">RX Series</a></li>
                  <li><a  href="lexus-ct200h/61708.html" id="amd_Lexus,CT200h" title="Lexus CT200h For Sale in Pakistan">CT200h</a></li>
                  <li><a  href="lexus-lx-series/733.html" id="amd_Lexus,LX Series" title="Lexus LX Series For Sale in Pakistan">LX Series</a></li>
                  <li><a  href="lexus-ls-series/734.html" id="amd_Lexus,Ls Series" title="Lexus Ls Series For Sale in Pakistan">Ls Series</a></li>
                  <li><a  href="lexus-any-model-103/676.html" id="amd_Lexus,Other" title="Lexus Other For Sale in Pakistan">Other</a></li>
                  <li><a  href="lexus-gs-series/735.html" id="amd_Lexus,Gs Series" title="Lexus Gs Series For Sale in Pakistan">Gs Series</a></li>
                  <li><a  href="lexus-sc-430/33683.html" id="amd_Lexus,Sc 430" title="Lexus Sc 430 For Sale in Pakistan">Sc 430</a></li>
                  <li><a  href="lexus-es-series/28769.html" id="amd_Lexus,Es Series" title="Lexus Es Series For Sale in Pakistan">Es Series</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="subaru/31.html" id="amk_subaru" title="Subaru Cars in Pakistan">
                    <div class="pw-make-80 subaru"></div>
                    <h3 class="nomargin">Subaru</h3>

                  </a>
                </li>
                  <li><a  href="subaru-pleo/893.html" id="amd_Subaru,Pleo" title="Subaru Pleo For Sale in Pakistan">Pleo</a></li>
                  <li><a  href="subaru-stella/24888.html" id="amd_Subaru,Stella" title="Subaru Stella For Sale in Pakistan">Stella</a></li>
                  <li><a  href="subaru-sambar-dias/969.html" id="amd_Subaru,Sambar " title="Subaru Sambar  For Sale in Pakistan">Sambar </a></li>
                  <li><a  href="subaru-any-model-115/686.html" id="amd_Subaru,Other" title="Subaru Other For Sale in Pakistan">Other</a></li>
                  <li><a  href="subaru-r2/892.html" id="amd_Subaru,R2" title="Subaru R2 For Sale in Pakistan">R2</a></li>
                  <li><a  href="subaru-impreza/34254.html" id="amd_Subaru,Impreza" title="Subaru Impreza For Sale in Pakistan">Impreza</a></li>
                  <li><a  href="subaru-brz/941.html" id="amd_Subaru,Brz" title="Subaru Brz For Sale in Pakistan">Brz</a></li>
                  <li><a  href="subaru-dias-wagon/33682.html" id="amd_Subaru,Dias Wagon" title="Subaru Dias Wagon For Sale in Pakistan">Dias Wagon</a></li>
                  <li><a  href="subaru-domingo/968.html" id="amd_Subaru,Domingo" title="Subaru Domingo For Sale in Pakistan">Domingo</a></li>
                  <li><a  href="subaru-justy/29018.html" id="amd_Subaru,Justy" title="Subaru Justy For Sale in Pakistan">Justy</a></li>
              </ul>
              <ul class="make-list list-unstyled">
                <li class="heading">
                  <a href="chevrolet/10.html" id="amk_chevrolet" title="Chevrolet Cars in Pakistan">
                    <div class="pw-make-80 chevrolet"></div>
                    <h3 class="nomargin">Chevrolet</h3>

                  </a>
                </li>
                  <li><a  href="chevrolet-joy/816.html" id="amd_Chevrolet,Joy" title="Chevrolet Joy For Sale in Pakistan">Joy</a></li>
                  <li><a  href="chevrolet-exclusive/762.html" id="amd_Chevrolet,Exclusive" title="Chevrolet Exclusive For Sale in Pakistan">Exclusive</a></li>
                  <li><a  href="chevrolet-optra/761.html" id="amd_Chevrolet,Optra" title="Chevrolet Optra For Sale in Pakistan">Optra</a></li>
                  <li><a  href="chevrolet-spark/823.html" id="amd_Chevrolet,Spark" title="Chevrolet Spark For Sale in Pakistan">Spark</a></li>
                  <li><a  href="chevrolet-caprice/721.html" id="amd_Chevrolet,Caprice" title="Chevrolet Caprice For Sale in Pakistan">Caprice</a></li>
                  <li><a  href="chevrolet-any-model-95/671.html" id="amd_Chevrolet,Other" title="Chevrolet Other For Sale in Pakistan">Other</a></li>
                  <li><a  href="chevrolet-matiz/939.html" id="amd_Chevrolet,Matiz" title="Chevrolet Matiz For Sale in Pakistan">Matiz</a></li>
                  <li><a  href="chevrolet-aveo/817.html" id="amd_Chevrolet,Aveo" title="Chevrolet Aveo For Sale in Pakistan">Aveo</a></li>
                  <li><a  href="chevrolet-camaro/61373.html" id="amd_Chevrolet,Camaro" title="Chevrolet Camaro For Sale in Pakistan">Camaro</a></li>
                  <li><a  href="chevrolet-corvette/851.html" id="amd_Chevrolet,Corvette" title="Chevrolet Corvette For Sale in Pakistan">Corvette</a></li>
              </ul>
            </ul>
      </div>
    </div>
  </div><!-- container -->
</section>



    <section>
  <div class="container">
    <h2>Used Cars By Type</h2>
      <div class="well clearfix">
        <div class="cards">

          <ul class="list-unstyled">

              <li>
                <a href="jeep/72893.html" class="show" data-category-name="" onclick="trackEvents(&#x27;CarSearch&#x27;,&#x27;UsedHome - BrowseByType&#x27;,&#x27;Jeep&#x27;);" title="Jeep for sale in Pakistan">
                    <img alt="Jeep for sale in Pakistan" src="images/used_car_in_price_range/Jeep-f8c394f70bf0da730f4f5ae4fd268fe1.jpg"" />
                    <h3 class="nomargin mt10 car_name">Jeep</h3>
                    <div class="generic-green">Starting from  3.5 lacs</div>
                    <div class="generic-grey">3000+ Cars Listed</div>
</a>              </li>
                

              <li>
                <a href="sports/72786.html" class="show" data-category-name="" onclick="trackEvents(&#x27;CarSearch&#x27;,&#x27;UsedHome - BrowseByType&#x27;,&#x27;Sports Cars&#x27;);" title="Sports Cars for sale in Pakistan">
                    <img alt="Sports Cars for sale in Pakistan" src="images/used_car_in_price_range/Sports-86ca1a108a8e07f0616b225d8caeb02a.jpg" />
                    <h3 class="nomargin mt10 car_name">Sports Cars</h3>
                    <div class="generic-green">Starting from  1.1 lacs</div>
                    <div class="generic-grey">268 Cars Listed</div>
</a>              </li>
                

              <li>
                <a href="hybrid/57335.html" class="show" data-category-name="" onclick="trackEvents(&#x27;CarSearch&#x27;,&#x27;UsedHome - BrowseByType&#x27;,&#x27;Hybrid Cars&#x27;);" title="Hybrid Cars for Sale in Pakistan">
                    <img alt="Hybrid Cars for Sale in Pakistan" src="images/used_car_in_price_range/Hybrid-abc5cc0100c8d13307b84a5ecd8fbc29.jpg" />
                    <h3 class="nomargin mt10 car_name">Hybrid Cars</h3>
                    <div class="generic-green">Starting from  1.9 lacs</div>
                    <div class="generic-grey">1000+ Cars Listed</div>
</a>              </li>
                

              <li>
                <a href="japanese/65933.html" class="show" data-category-name="" onclick="trackEvents(&#x27;CarSearch&#x27;,&#x27;UsedHome - BrowseByType&#x27;,&#x27;Japanese Cars&#x27;);" title="Japanese Used Cars for Sale in Pakistan">
                    <img alt="Japanese Used Cars for Sale in Pakistan" src="images/used_car_in_price_range/Japanese-1053259ebbcaa86965beaba8af2c76d9.jpg" />
                    <h3 class="nomargin mt10 car_name">Japanese Cars</h3>
                    <div class="generic-green">Starting from  <span class='pkr'>PKR</span> 11</div>
                    <div class="generic-grey">18000+ Cars Listed</div>
</a>              </li>
                

              <li>
                <a href="luxury/72787.html" class="show" data-category-name="" onclick="trackEvents(&#x27;CarSearch&#x27;,&#x27;UsedHome - BrowseByType&#x27;,&#x27;Luxury Cars&#x27;);" title="Luxury Cars for sale in Pakistan">
                    <img alt="Luxury Cars for sale in Pakistan" src="images/used_car_in_price_range/Luxury-ae1bbc1344c3dbf0c8d6da1da05b178e.jpg" />
                    <h3 class="nomargin mt10 car_name">Luxury Cars</h3>
                    <div class="generic-green">Starting from  <span class='pkr'>PKR</span> 1,000</div>
                    <div class="generic-grey">2000+ Cars Listed</div>
</a>              </li>
                

              <li>
                <a href="imported/57428.html" class="show" data-category-name="" onclick="trackEvents(&#x27;CarSearch&#x27;,&#x27;UsedHome - BrowseByType&#x27;,&#x27;Imported Cars&#x27;);" title="Imported Cars for Sale in Pakistan">
                    <img alt="Imported Cars for Sale in Pakistan" src="images/used_car_in_price_range/Imported-31c2a7b392b11ac4356e5f338363aec0.jpg" />
                    <h3 class="nomargin mt10 car_name">Imported Cars</h3>
                    <div class="generic-green">Starting from  2.7 lacs</div>
                    <div class="generic-grey">5000+ Cars Listed</div>
</a>              </li>
                

              <li>
                <a href="automatic/57336.html" class="show" data-category-name="" onclick="trackEvents(&#x27;CarSearch&#x27;,&#x27;UsedHome - BrowseByType&#x27;,&#x27;Automatic Cars&#x27;);" title="Automatic Cars for Sale in Pakistan">
                    <img alt="Automatic Cars for Sale in Pakistan" src="images/used_car_in_price_range/Automatic-20f89b6970162d115fee87aaac74337b.jpg" />
                    <h3 class="nomargin mt10 car_name">Automatic Cars</h3>
                    <div class="generic-green">Starting from  <span class='pkr'>PKR</span> 11</div>
                    <div class="generic-grey">23000+ Cars Listed</div>
</a>              </li>
                

              <li>
                <a href="diesel/57337.html" class="show" data-category-name="" onclick="trackEvents(&#x27;CarSearch&#x27;,&#x27;UsedHome - BrowseByType&#x27;,&#x27;Diesel Cars&#x27;);" title="Diesel Cars for Sale in Pakistan">
                    <img alt="Diesel Cars for Sale in Pakistan" src="images/used_car_in_price_range/Diesel-6f092630c0f2e0364f23cbce77c855dc.jpg" />
                    <h3 class="nomargin mt10 car_name">Diesel Cars</h3>
                    <div class="generic-green">Starting from  <span class='pkr'>PKR</span> 1,000</div>
                    <div class="generic-grey">1000+ Cars Listed</div>
</a>              </li>
                
          </ul>

        </div>
      </div>
  </div>
</section>

  
  <section>
    <div class="container">      
      <h2>Used Cars by City</h2>
      <table class="table well"> 
        <tbody> 
          <tr>
            <td class="ptb0">
              <ul class="used-city-list list-unstyled clearfix mb0" id="browse-by-city-car">
                  <li class="col-md-4">
                    <a href="lahore/24858.html" id="ct_lahore" title="Cars for Sale in Lahore">
                      <h3>Cars Lahore</h3>
                      11000+ Used Cars
</a>                  </li>
                  <li class="col-md-4">
                    <a href="karachi/24857.html" id="ct_karachi" title="Cars for Sale in Karachi">
                      <h3>Cars Karachi</h3>
                      10000+ Used Cars
</a>                  </li>
                  <li class="col-md-4">
                    <a href="islamabad/24856.html" id="ct_islamabad" title="Cars for Sale in Islamabad">
                      <h3>Cars Islamabad</h3>
                      8000+ Used Cars
</a>                  </li>
                  <li class="col-md-4">
                    <a href="rawalpindi/24831.html" id="ct_rawalpindi" title="Cars for Sale in Rawalpindi">
                      <h3>Cars Rawalpindi</h3>
                      4000+ Used Cars
</a>                  </li>
                  <li class="col-md-4">
                    <a href="peshawar/24821.html" id="ct_peshawar" title="Cars for Sale in Peshawar">
                      <h3>Cars Peshawar</h3>
                      1000+ Used Cars
</a>                  </li>
                  <li class="col-md-4">
                    <a href="multan/24810.html" id="ct_multan" title="Cars for Sale in Multan">
                      <h3>Cars Multan</h3>
                      1000+ Used Cars
</a>                  </li>
                  <li class="col-md-4">
                    <a href="faisalabad/24753.html" id="ct_faisalabad" title="Cars for Sale in Faisalabad">
                      <h3>Cars Faisalabad</h3>
                      871 Used Cars
</a>                  </li>
                  <li class="col-md-4">
                    <a href="gujranwala/24763.html" id="ct_gujranwala" title="Cars for Sale in Gujranwala">
                      <h3>Cars Gujranwala</h3>
                      764 Used Cars
</a>                  </li>
                  <li class="col-md-4">
                    <a href="bahawalpur/24732.html" id="ct_bahawalpur" title="Cars for Sale in Bahawalpur">
                      <h3>Cars Bahawalpur</h3>
                      550 Used Cars
</a>                  </li>
                
              </ul>
            </td>
          </tr>
        </tbody> 
      </table>
    </div>
  </section>



<section>
  <div class="container">
    <div class="used-featured-dealers clearfix">
      <h2>Featured Dealers </h2>

                <div class="dealer-featured nomargin">
        <div id="dealer-slider" class="row">
              <ul class="list-unstyled nomargin">
                    <li class="col-md-2" itemscope itemtype="http://schema.org/AutoDealer">
                    <meta itemprop="name" content="Car Lounge">

                    <meta itemprop="image" content="https://cache4.pakwheels.com/system/dealerships/dealers/000/011/327/thumb/11327.jpg?1502274389">
                      <a href="dealers/car-lounge-showroom-in-karachi.html" class="generic-basic" itemprop="url">
                          <img alt="Car Lounge" class="lazy" data-original="https://cache4.pakwheels.com/system/dealerships/dealers/000/011/327/thumb/11327.jpg?1502274389" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Car Lounge, Karachi" />
</a>                    </li>
                    <li class="col-md-2" itemscope itemtype="http://schema.org/AutoDealer">
                    <meta itemprop="name" content="Liberty Automobiles">

                    <meta itemprop="image" content="https://cache4.pakwheels.com/system/dealerships/dealers/000/006/277/thumb/6277.jpg?1502274122">
                      <a href="dealers/liberty-automobiles-showroom-in-karachi.html" class="generic-basic" itemprop="url">
                          <img alt="Liberty Automobiles" class="lazy" data-original="https://cache4.pakwheels.com/system/dealerships/dealers/000/006/277/thumb/6277.jpg?1502274122" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Liberty Automobiles, Karachi" />
</a>                    </li>
                    <li class="col-md-2" itemscope itemtype="http://schema.org/AutoDealer">
                    <meta itemprop="name" content="Merchants Automobiles">

                    <meta itemprop="image" content="https://cache4.pakwheels.com/system/dealerships/dealers/000/016/864/thumb/16864.jpg?1502274488">
                      <a href="dealers/merchants-automobiles-showroom-in-pakistan.html" class="generic-basic" itemprop="url">
                          <img alt="Merchants Automobiles" class="lazy" data-original="https://cache4.pakwheels.com/system/dealerships/dealers/000/016/864/thumb/16864.jpg?1502274488" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Merchants Automobiles, " />
</a>                    </li>
                    <li class="col-md-2" itemscope itemtype="http://schema.org/AutoDealer">
                    <meta itemprop="name" content="Sam Automobiles">

                    <meta itemprop="image" content="https://cache4.pakwheels.com/system/dealerships/dealers/000/011/234/thumb/11234.jpg?1502274385">
                      <a href="dealers/sam-autombiles-showroom-in-pakistan.html" class="generic-basic" itemprop="url">
                          <img alt="Sam Automobiles" class="lazy" data-original="https://cache4.pakwheels.com/system/dealerships/dealers/000/011/234/thumb/11234.jpg?1502274385" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Sam Automobiles, N/A" />
</a>                    </li>
                    <li class="col-md-2" itemscope itemtype="http://schema.org/AutoDealer">
                    <meta itemprop="name" content="Top Carz">

                    <meta itemprop="image" content="#">
                      <a href="dealers/top-carz-showroom-in-pakistan--2.html" class="generic-basic" itemprop="url">
                          <img alt="Top Carz" class="lazy" data-original="/assets/dealers/thumb/missing.png" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Top Carz, " />
</a>                    </li>
                    <li class="col-md-2" itemscope itemtype="#">
                    <meta itemprop="name" content="Ucars.pk">

                    <meta itemprop="image" content="#">
                      <a href="dealers/u-cars-showroom-in-n-a.html" class="generic-basic" itemprop="url">
                          <img alt="Ucars.pk" class="lazy" data-original="#" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" title="Ucars.pk, N/A" />
</a>                    </li>
              </ul>
        </div>
      </div>



          <div class="clear-link">
            <a href="dealers/index.html" class="more-link">View All Dealers</a>
          </div>
    </div>
  </div>
</section>





    </div>
  
</div>
@endsection

@section('jsblock')

 
<script src="{{URL:: asset('js/Used Car/top_javascript-4c1cf070410b188168ccc1759df8f669.js') }}" type="text/javascript"></script>
<script src="{{URL ::asset('js/Used Car/index_used_cars.js') }}" type="text/javascript"></script>

    <script>
  user_type = 'Anonymous';
  is_mobile = '0';
  newsletter_subscriber = 'false';
  logged_in=false;
  hashed_email='';
         car_listings=bike_listings=parts_listings='';
  pw_language = 'English';
</script>



    <script>
    $(function(){
      var make= $('#UsedManID').val();
      if (make) {
        updateModels('car',make, $('#UsedModelID'), 'All Models'); reloadChosen('#UsedModelID');
        updateVersion('car',$('#UsedModelID').val(), make, $('#UsedVersionID'), 'All Versions');reloadChosen('#UsedVersionID');
      }
      $(".search-main").bind('keydown',function(e) {
        if(e.which === 13 && $(".chzn-single-with-drop").length==0 &&!$("select").is(":focus")) {
            $('.search-main #used-cars-search-btn').click();
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(function(){
      if($('#carSliderWrapper #slider').length > 0){
        var carSlider = $('#carSliderWrapper #slider').bxSlider({
          infiniteLoop: true,
          auto: false,
          autoControls: false,
          autoHover: true,
          speed:1000,
          pause: 10000,
          pager:false,
          nextSelector: '.slider-next',
          prevSelector: '.slider-prev',
          nextText: '<i class="fa fa-chevron-right"></i>',
          prevText: '<i class="fa fa-chevron-left"></i>',
          onSlideBefore: function(slide){
              lazyLoadSliderImages(slide,'.lazy-car-slider')
          }
        });
        var first_slide_images = carSlider.getCurrentSlideElement().find('.lazy-car-slider')
        applyImagesLazyLoad(first_slide_images);
      }
    });
  </script>
    <script>
      var fetch_f_ads=true;
      $(function(){
        if($('#slider1').length > 0){
          $('#slider1').bxSlider({
            auto: false,
            autoControls: false,
            autoHover: true,
            speed:1000,
            pause: 10000,
            pager:false,
            nextSelector: '.slider1-next',
            prevSelector: '.slider1-prev',
            nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>',
          });
        }
      });
    </script>
    <script>
        $(document).ready(function() {
            $('.bxSlider').each(function(i,slider){
                $(slider).bxSlider({
                    infiniteLoop: false,
                    hideControlOnEnd: true,
                    auto: false,
                    autoControls: false,
                    autoHover: true,
                    speed: 1000,
                    pause: 10000,
                    minSlides: 4,
                    maxSlides: 4,
                    pager: false,
                    nextSelector: $(slider).attr('data-link-next'),
                    prevSelector: $(slider).attr('data-link-prev'),
                    nextText: '<i class="fa fa-chevron-right"></i>',
                    prevText: '<i class="fa fa-chevron-left"></i>',
                });
            });
            slideShowContent(this);
            applyImagesLazyLoad();
        });
    </script>
    <script>
      $('.nav-dropdown-menu').on('mouseover', function() {
        $(this).parent().addClass('open');
      });
      $('.nav-dropdown-menu').on('mouseout', function() {
        $(this).parent().removeClass('open');
      });
      $(document).ready(function (){ $('#navbar_static_top').attr('data-offset-top', $('.advertisement').innerHeight() + $('.header').innerHeight());

      $("#user-menu,#lang-menu").click(function(e){
        $(this).toggleClass("open");
          e.stopPropagation();
      });

      });
    </script>


  

    <script>var om_load_jquery = false;</script>
    <div id="om-dxawge5rc65nrwtv-holder"></div>
    <script>
      $(window).load(function(){
        var dxawge5rc65nrwtv,dxawge5rc65nrwtv_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){dxawge5rc65nrwtv_poll(function(){if(window['om_loaded']){if(!dxawge5rc65nrwtv){dxawge5rc65nrwtv=new OptinMonsterApp();return dxawge5rc65nrwtv.init({u:"10331.222818",staging:0,dev:0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n, o.async=true, o.src="#",o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;dxawge5rc65nrwtv=new OptinMonsterApp();dxawge5rc65nrwtv.init({u:"10331.222818",staging:0,dev:0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");
      });
    </script>

  
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    
 
  </body>

</html>

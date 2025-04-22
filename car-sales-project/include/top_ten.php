<div class="top-ten-section container mx-auto px-4 py-6" x-data="{ activeTab: 'cars' }">
  <h2 class="text-2xl font-bold mb-4">រកឡានបន្ទាប់របស់អ្នកនៅក្នុង <span class="nowrap"> Cambodia </span></h2>
  <p class="mb-6">លឿនមានសុវត្ថិភាពនិងងាយស្រួលក្នុងការទិញនិងលក់យានយន្តក្នុងស្រុក</p>
  <ul class="flex space-x-4 border-b mb-6">
    <li>
      <button
        class="pb-2 border-b-2"
        :class="activeTab === 'cars' ? 'border-blue-600 font-semibold' : 'border-transparent'"
        @click="activeTab = 'cars'">
        រថយន្ត
      </button>
    </li>
    <li>
      <button
        class="pb-2 border-b-2"
        :class="activeTab === 'bikes' ? 'border-blue-600 font-semibold' : 'border-transparent'"
        @click="activeTab = 'bikes'">
        កង់
      </button>
    </li>
    <li>
      <button
        class="pb-2 border-b-2"
        :class="activeTab === 'trucks' ? 'border-blue-600 font-semibold' : 'border-transparent'"
        @click="activeTab = 'trucks'">
        ឡានដឹកទំនិញ
      </button>
    </li>
  </ul>

  <div class="tab-content">
    <div x-show="activeTab === 'cars'" class="tab-pane fade show active">
      <form class="simple_form homepage_search" novalidate="novalidate" action="/km/ads" accept-charset="UTF-8" method="get">
        <input name="utf8" type="hidden" value="✓">
        <div class="row no-gutters">
          <div class="col-lg-12">
            <div class="row separator-b no-gutters">
              <div class="col-lg-3 separator-r">
                <label for="listing_brand_id"><span>ម៉ាក</span><i class="fa fa-angle-down"></i>
                  <div class="input select required listing_brand_id">
                    <select class="select required chosen-primary-single-select home-brand-select" data-car-type="car" data-option="ទាំងអស់" name="listing[brand_id]" id="listing_brand_id" style="display: none;">
                      <option value="">ទាំងអស់</option>
                      <option value="75">Abarth</option>
                      <option value="106">Acura</option>
                      <option value="238">Adler</option>
                      <option value="92">Alfa Romeo</option>
                      <option value="239">Alpina</option>
                      <option value="237">Alpine</option>
                      <option value="236">AMC</option>
                      <option value="244">Aston Martin</option>
                      <option value="47">Audi</option>
                      <option value="395">Avtokam</option>
                      <option value="242">Baltijas Dzips</option>
                      <option value="247">Beijing</option>
                      <option value="246">Bentley</option>
                      <option value="48">BMW</option>
                      <option value="80">Bolwell</option>
                      <option value="257">Buick</option>
                      <option value="252">Byvin</option>
                      <option value="37">Cadillac</option>
                      <option value="258">Carbodies</option>
                      <option value="261">Changan</option>
                      <option value="38">Chery</option>
                      <option value="441">Chevlolet</option>
                      <option value="11">Chevrolet</option>
                      <option value="58">Chrysler</option>
                      <option value="36">CHTC</option>
                      <option value="59">Daewoo</option>
                      <option value="60">Daihatsu</option>
                      <option value="61">Dodge</option>
                      <option value="284">Ferrari</option>
                      <option value="78">Fiat</option>
                      <option value="286">Fisker</option>
                      <option value="438">Flanker</option>
                      <option value="49">Ford</option>
                      <option value="439">FORD</option>
                      <option value="282">Foton</option>
                      <option value="436">GAC</option>
                      <option value="70">Geely</option>
                      <option value="90">GMC</option>
                      <option value="423">GP</option>
                      <option value="29">Great Wall</option>
                      <option value="290">Haval</option>
                      <option value="298">Hindustan</option>
                      <option value="422">Hispano-Suiza</option>
                      <option value="6">Honda</option>
                      <option value="294">HuangHai</option>
                      <option value="91">Hummer</option>
                      <option value="50">Hyundai</option>
                      <option value="79">Infiniti</option>
                      <option value="302">Iran Khodro</option>
                      <option value="27">Isuzu</option>
                      <option value="308">JAC</option>
                      <option value="28">Jaguar</option>
                      <option value="62">Jeep</option>
                      <option value="407">Kanonir</option>
                      <option value="9">Kia</option>
                      <option value="51">Land Rover</option>
                      <option value="312">Landwind</option>
                      <option value="63">Lexus</option>
                      <option value="313">Lincoln</option>
                      <option value="71">Lotus</option>
                      <option value="318">Maserati</option>
                      <option value="319">Maybach</option>
                      <option value="64">Mazda</option>
                      <option value="321">McLaren</option>
                      <option value="329">Mercedes-Benz</option>
                      <option value="331">MG</option>
                      <option value="83">Mini</option>
                      <option value="52">Mitsubishi</option>
                      <option value="5">Nissan</option>
                      <option value="53">Opel</option>
                      <option value="54">Peugeot</option>
                      <option value="85">Porsche</option>
                      <option value="345">Premier</option>
                      <option value="440">Range Rover</option>
                      <option value="4">Renault</option>
                      <option value="353">Renault Samsung</option>
                      <option value="354">Rolls-Royce</option>
                      <option value="66">Rover</option>
                      <option value="363">Santana</option>
                      <option value="361">Saturn</option>
                      <option value="362">SEAT</option>
                      <option value="358">ShuangHuan</option>
                      <option value="88">Smart</option>
                      <option value="365">Soueast</option>
                      <option value="89">SsangYong</option>
                      <option value="417">Steyr</option>
                      <option value="67">Subaru</option>
                      <option value="104">Suzuki</option>
                      <option value="103">Tata</option>
                      <option value="371">Tesla</option>
                      <option value="55">Toyota</option>
                      <option value="373">Triumph</option>
                      <option value="410">UAZ</option>
                      <option value="376">Ultima</option>
                      <option value="94">Volkswagen</option>
                      <option value="95">Volvo</option>
                    </select>
                  </div>
                </label>
              </div>
              <div class="col-lg-3 separator-r">
                <label for="listing_model_id"><span>គំរូ</span><i class="fa fa-angle-down"></i>
                  <div class="input select required listing_model_id">
                    <select class="select required chosen-primary-single-select home-model-select" data-car-type="car_type" disabled="disabled" name="listing[model_id]" id="listing_model_id" style="display: none;">
                      <option value="">ជ្រើសរើសម៉ាកជាមុនសិន</option>
                      <option value="true">ត្រូវហើយ</option>
                      <option value="false">ទេ</option>
                    </select>
                  </div>
                </label>
              </div>
              <div class="col-lg-3 separator-r">
                <label for="listing_city_id"><span>ទីក្រុង</span><i class="fa fa-angle-down"></i>
                  <select name="listing[city_id][]" id="listing_city_id_" class="chosen-primary-single-select" style="display: none;">
                    <option value="">ទាំងអស់</option>
                    <option value="51">Import - Dubai</option>
                  </select>
                </label>
              </div>
              <div class="input hidden listing_car_type">
                <input value="1" class="hidden" type="hidden" name="listing[car_type]" id="listing_car_type">
              </div>
              <div class="col-lg-3">
                <div class="offers-btn md-hidden">
                  <button name="button" type="submit" class="btn af-btn lg red"><i class="fa fa-search"></i>ស្វែងរក</button>
                </div>
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-lg-6 separator-r align-middle">
                <div class="range-slider">
                  <div class="range-wrapper">
                    <span>ជួរតម្លៃ</span>
                    <div class="range-nav">
                      <span>ពី</span>
                      <span class="lower-value">$ 100</span>
                      <span class="hidden"></span>
                      <span class="divider">-</span>
                      <span>ទៅ</span>
                      <span class="upper-value">$ 300,001</span>
                    </div>
                  </div>
                  <div class="nonlinear noUi-target noUi-ltr noUi-horizontal">
                    <div class="noUi-base">
                      <div class="noUi-connects">
                        <div class="noUi-connect noUi-draggable" style="transform: translate(0%, 0px) scale(1, 1);"></div>
                      </div>
                      <div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 5;">
                        <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="100.00"></div>
                      </div>
                      <div class="noUi-origin" style="transform: translate(0%, 0px); z-index: 4;">
                        <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="300001.00"></div>
                      </div>
                    </div>
                  </div>
                  <div class="input hidden listing_minprice">
                    <input class="hidden min-price" type="hidden" name="listing[minprice]" id="listing_minprice" value="100">
                  </div>
                  <div class="input hidden listing_maxprice">
                    <input class="hidden max-price" type="hidden" name="listing[maxprice]" id="listing_maxprice" value="300001">
                  </div>
                </div>
              </div>
              <div class="col-lg-3 separator-r">
                <label for="listing_condition"><span>លក្ខខណ្ឌ</span><i class="fa fa-angle-down"></i>
                  <div class="input select required listing_condition">
                    <select class="select required chosen-primary-single-select" name="listing[condition]" id="listing_condition" style="display: none;">
                      <option value="">ទាំងអស់</option>
                      <option value="1">ថ្មី</option>
                      <option value="2">បានប្រើ</option>
                      <option value="3">នាំចូល</option>
                    </select>
                  </div>
                </label>
              </div>
              <div class="col-lg-3">
                <div class="offers-btn md-hidden">
                  <div class="search-car-title">រកមិនឃើញអ្វីដែលអ្នកកំពុងរកទេ?</div>
                  <a class="af-btn dark-blue search-ad-car-btn" href="/km/listing_inquiries/new">ទុកការផ្សាយពាណិជ្ជកម្មស្វែងរកឡាន</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div x-show="activeTab === 'bikes'" class="tab-pane no-gutters fade">
      <form class="simple_form homepage_search" novalidate="novalidate" action="/km/ads" accept-charset="UTF-8" method="get">
        <input name="utf8" type="hidden" value="✓">
        <div class="row no-gutters">
          <div class="col-lg-12">
            <div class="row separator-b no-gutters">
              <div class="col-lg-3 separator-r">
                <label for="listing_brand_id"><span>ម៉ាក</span><i class="fa fa-angle-down"></i>
                  <div class="input select required listing_brand_id">
                    <select class="select required chosen-primary-single-select home-brand-select" data-car-type="moto" data-option="ទាំងអស់" name="listing[brand_id]" id="listing_brand_id" style="display: none;">
                      <option value="">ទាំងអស់</option>
                      <option value="127">Bajaj</option>
                      <option value="12">BMW</option>
                      <option value="107">Can–am</option>
                      <option value="121">Ducati</option>
                      <option value="227">Harley Davidson</option>
                      <option value="25">Honda</option>
                      <option value="122">Kawasaki</option>
                      <option value="73">KTM</option>
                      <option value="152">Royal Enfield</option>
                      <option value="99">Suzuki</option>
                      <option value="203">Ural</option>
                      <option value="205">Vespa</option>
                      <option value="100">Yamaha</option>
                    </select>
                  </div>
                </label>
              </div>
              <div class="col-lg-3 separator-r">
                <label for="listing_model_id"><span>គំរូ</span><i class="fa fa-angle-down"></i>
                  <div class="input select required listing_model_id">
                    <select class="select required chosen-primary-single-select home-model-select" data-car-type="car_type" disabled="disabled" name="listing[model_id]" id="listing_model_id" style="display: none;">
                      <option value="">ជ្រើសរើសម៉ាកជាមុនសិន</option>
                      <option value="true">ត្រូវហើយ</option>
                      <option value="false">ទេ</option>
                    </select>
                  </div>
                </label>
              </div>
              <div class="col-lg-3 separator-r">
                <label for="listing_city_id"><span>ទីក្រុង</span><i class="fa fa-angle-down"></i>
                  <select name="listing[city_id][]" id="listing_city_id_" class="chosen-primary-single-select" style="display: none;">
                    <option value="">ទាំងអស់</option>
                    <option value="51">Import - Dubai</option>
                  </select>
                </label>
              </div>
              <div class="input hidden listing_car_type">
                <input value="2" class="hidden" type="hidden" name="listing[car_type]" id="listing_car_type">
              </div>
              <div class="col-lg-3">
                <div class="offers-btn md-hidden">
                  <button name="button" type="submit" class="btn af-btn lg red"><i class="fa fa-search"></i>ស្វែងរក</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div x-show="activeTab === 'trucks'" class="tab-pane no-gutters fade">
      <form class="simple_form homepage_search" novalidate="novalidate" action="/km/ads" accept-charset="UTF-8" method="get">
        <input name="utf8" type="hidden" value="✓">
        <div class="row no-gutters">
          <div class="col-lg-12">
            <div class="row separator-b no-gutters">
              <div class="col-lg-3 separator-r">
                <label for="listing_brand_id"><span>ម៉ាក</span><i class="fa fa-angle-down"></i>
                  <div class="input select required listing_brand_id">
                    <select class="select required chosen-primary-single-select home-brand-select" data-car-type="truck" data-option="ទាំងអស់" name="listing[brand_id]" id="listing_brand_id" style="display: none;">
                      <option value="">ទាំងអស់</option>
                      <option value="21">Caterpillar</option>
                      <option value="56">Citroen</option>
                      <option value="13">DAF</option>
                      <option value="96">Ford</option>
                      <option value="31">Hino</option>
                      <option value="34">Hyundai</option>
                      <option value="32">Mitsubishi</option>
                      <option value="33">Nissan</option>
                      <option value="43">Suzuki</option>
                      <option value="42">Toyota</option>
                      <option value="41">Volkswagen</option>
                    </select>
                  </div>
                </label>
              </div>
              <div class="col-lg-3 separator-r">
                <label for="listing_model_id"><span>គំរូ</span><i class="fa fa-angle-down"></i>
                  <div class="input select required listing_model_id">
                    <select class="select required chosen-primary-single-select home-model-select" data-car-type="car_type" disabled="disabled" name="listing[model_id]" id="listing_model_id" style="display: none;">
                      <option value="">ជ្រើសរើសម៉ាកជាមុនសិន</option>
                      <option value="true">ត្រូវហើយ</option>
                      <option value="false">ទេ</option>
                    </select>
                  </div>
                </label>
              </div>
              <div class="col-lg-3 separator-r">
                <label for="listing_city_id"><span>ទីក្រុង</span><i class="fa fa-angle-down"></i>
                  <select name="listing[city_id][]" id="listing_city_id_" class="chosen-primary-single-select" style="display: none;">
                    <option value="">ទាំងអស់</option>
                    <option value="51">Import - Dubai</option>
                  </select>
                </label>
              </div>
              <div class="input hidden listing_car_type">
                <input value="3" class="hidden" type="hidden" name="listing[car_type]" id="listing_car_type">
              </div>
              <div class="col-lg-3">
                <div class="offers-btn md-hidden">
                  <button name="button" type="submit" class="btn af-btn lg red"><i class="fa fa-search"></i>ស្វែងរក</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="top-make">
  <div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">ម៉ាកល្បី ៗ</h2>
    <ul class="nav flex space-x-4 border-b mb-4">
      <li class="nav-item">
        <a class="nav-link active border-b-2 border-blue-600 pb-2" href="#cars-top" @click.prevent="activeTab = 'cars'">រថយន្ត</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border-b-2 border-transparent pb-2" href="#bikes-top" @click.prevent="activeTab = 'bikes'">កង់</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border-b-2 border-transparent pb-2" href="#trucks-top" @click.prevent="activeTab = 'trucks'">ឡានដឹកទំនិញ</a>
      </li>
    </ul>
    <div x-data="{ activeTab: 'cars' }">
      <div x-show="activeTab === 'cars'" class="tab-pane fade show active" id="cars-top">
        <div class="top-make-panel grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
          <a href="/km/buy-Toyota" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/55/buy-cars-toyota.png" alt="Toyota" title="Toyota" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Toyota</span>
          </a>
          <a href="/km/buy-Lexus" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/63/buy-cars-lexus.png" alt="Lexus" title="Lexus" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Lexus</span>
          </a>
          <a href="/km/buy-Hyundai" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/50/buy-cars-hyundai.png" alt="Hyundai" title="Hyundai" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Hyundai</span>
          </a>
          <a href="/km/buy-Ford" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/49/ford.png" alt="Ford" title="Ford" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Ford</span>
          </a>
          <a href="/km/buy-Mercedes-Benz" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/329/buy-cars-mercedes-benz.png" alt="Mercedes-Benz" title="Mercedes-Benz" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Mercedes-Benz</span>
          </a>
          <a href="/km/buy-Kia" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/9/buy-cars-kia.png" alt="Kia" title="Kia" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Kia</span>
          </a>
        </div>
      </div>
      <div x-show="activeTab === 'bikes'" class="tab-pane fade" id="bikes-top">
        <div class="top-make-panel grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
          <a href="/km/buy-BMW" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/12/buy-cars-bmw.png" alt="BMW" title="BMW" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">BMW</span>
          </a>
          <a href="/km/buy-Honda" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/25/buy-cars-honda.png" alt="Honda" title="Honda" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Honda</span>
          </a>
          <a href="/km/buy-Yamaha" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/100/buy-cars-yamaha.png" alt="Yamaha" title="Yamaha" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Yamaha</span>
          </a>
          <a href="/km/buy-Suzuki" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/99/buy-cars-suzuki.png" alt="Suzuki" title="Suzuki" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Suzuki</span>
          </a>
          <a href="/km/buy-KTM" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/73/buy-cars-ktm.png" alt="KTM" title="KTM" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">KTM</span>
          </a>
        </div>
      </div>
      <div x-show="activeTab === 'trucks'" class="tab-pane fade" id="trucks-top">
        <div class="top-make-panel grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
          <a href="/km/buy-Toyota" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/42/buy-cars-toyota.png" alt="Toyota" title="Toyota" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Toyota</span>
          </a>
          <a href="/km/buy-Mitsubishi" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/32/buy-cars-mitsubishi.png" alt="Mitsubishi" title="Mitsubishi" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Mitsubishi</span>
          </a>
          <a href="/km/buy-Nissan" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/33/buy-cars-nissan.png" alt="Nissan" title="Nissan" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Nissan</span>
          </a>
          <a href="/km/buy-Hino" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/31/buy-cars-hino.png" alt="Hino" title="Hino" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Hino</span>
          </a>
          <a href="/km/buy-Suzuki" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/43/buy-cars-suzuki.png" alt="Suzuki" title="Suzuki" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Suzuki</span>
          </a>
          <a href="/km/buy-Ford" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/96/ford.png" alt="Ford" title="Ford" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Ford</span>
          </a>
          <a href="/km/buy-Caterpillar" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/21/caterpillar.png" alt="Caterpillar" title="Caterpillar" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">Caterpillar</span>
          </a>
          <a href="/km/buy-DAF" class="top-make-card flex flex-col items-center p-4 border rounded hover:shadow-lg transition">
            <img src="https://mykhmercar.s3.amazonaws.com/uploads/brand/icon/13/daf.png" alt="DAF" title="DAF" class="w-20 h-20 object-contain mb-2" />
            <span class="brand text-center">DAF</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <a href="/km/brands" class="af-btn sm white inline-block px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">សូមមើលម៉ាកទាំងអស់</a>
    </div>
  </div>
</div>

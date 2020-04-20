<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<h1>Cara Penggunaan</h1>
	<ul>
		<li>Download repo ini ke local anda.</li>
		<li>Download Composer terlebih dahulu disini <a href="https://getcomposer.org/Composer-Setup.exe">Composer</a></li>
		<li>Lakukan penginstalan Composer</li>
		<li>Buatlah database <b>smart_parking</b> pada localhost anda.</li>
		<li>Extract repo yang telah anda download tadi ke dalam folder <b>xampp/htdocs/-->(disini)<--</b></li>
		<li>Lalu rename folder <b>Smart-Parking-master</b> menjadi <b>Smart-Parking</b></li>
		<li>Rename file <b>.env.example</b> menjadi <b>.env</b> yang berada di dalam directory Smart-Parking</li>
		<li>Buka command prompt yang mengarah ke directory Smart-Parking.</li>
		<li>Jalankan perintah berikut :
			<ul>
				<li>composer install</li>
				<li>php artisan migrate</li>
				<li>php artisan db:seed</li>
				<li>php artisan serve</li>
			</ul>
		</li>
		<li>Buka browser anda dan ketikan " localhost:8000 " pada url browser anda.</li>
		<li>Email dan password dapat anda lihat pada database <b>smart_parking</b> > tabel <b>user</b>.
			<br>(password ter-enkripsi menggunakan metode Hashing bCrypt)</li>
		<li><u>Email</u> digenerate secara random</li>
		<li><u>Passwordnya</u> adalah <b>password</b></li>
		<li>Silahkan login dengan senang hati :)</li>
	</ul>

<h1>License</h1>

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

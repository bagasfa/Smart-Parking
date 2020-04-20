<p align="center"><img src="https://raw.githubusercontent.com/bagasfa/Smart-Parking/master/public/assets/img/logo.png" width="200"></p>

<center><h1>Smart Parking</h1></center>

<h2>Cara Penggunaan</h2>
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
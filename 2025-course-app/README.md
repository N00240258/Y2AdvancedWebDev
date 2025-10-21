<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


<!-- 

    Week 1
    For the first week I creted this project and followed along with the lessons left on the classroom on teams.
    This involved creating the index, create, show and edit files for the courses but I didnt add anything in them yet.
    Then I made my course seeder and migrate files which was a way of making a database in mysql using code so I didnt 
    have to memorise everything I put in the database> I originally had an issue with this because when I went home and 
    tried to use php artisan migrate the data would not go onto the database, I believe this was because I didnt call the
    course model file at the beginning. I followed along up to lesson 7 during this week but none of the courses were 
    showing up in the index which I thought was my own mistake but then found out I needed to do more of the lessons 
    to get my courses to show up on the website

    Week 2
    During week 2 I worked on doing lessons 8, 9 and 10. Lesson 8 was for making the component for the courses to show 
    up on the screen which basically works as a template for the courses and allows them to all look the same all while 
    having different content. Lesson 9 was to show the course more indepth by clicking on a certain course and being able 
    to see more of it like the description and points. Lesson 10 was to get to create a course form working which wasnt 
    too complicated to get started but I did have some issues where the images would not go into a folder but would create 
    a folder and go into that which I wasnt able to fix but I did move it out of my one drive to the a documents folder 
    and that managed to fix the problem. After getting the index, create and show working I decided to move onto to doing
    the edit/update and delete which all went pretty smoothly and didnt have much problems with those.

    Week 3
    During Week 3 I was pretty much all finished so I just spent some time going around and commenting a lot of all the 
    things I had put in myself and explaining them. During this time I also added more courses to the seeder to get the 
    database a bit more filled out and not only have 3 different courses on the index. After I added more courses to the 
    seeder I noticed that one of the title was a bit too long and ended up going onto the next line and making that one 
    course card a bit longer than all the other which I didnt like. To fix this made it so that if the title was over 24 
    characters it would get cut off and put "..." on the end. I ended up making this more complicated for myself at first 
    by using the function "count_chars()" instead of "strlen()" which gets each unique character in a string and outputs 
    them. I ended up finding the right function later on and getting it sorted though

    Week 4
    During the last week I decided to add a search bar to the index page that allows me to search through my courses that 
    works by finding the titles that are like the text I input into the search bar. I added some more comments to a few more
    of the files to finalise all the comments on everything. I tried to style the index using tailwind to make it look less 
    like laravel and a bit nicer but nothing I did ended up looking any good so I stuck with the style already being used 
    and added a bit more to make it feel a bit more interactive like buttons changing colours when you click on them and the 
    cards getting a bit darker when you hover over them. Finally I did this read me timeline and got everything sorted and 
    finished to submit for the deadline

 -->

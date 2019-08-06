@extends('layouts.faculty_admin')
@section('content')


    <!-- Banner -->
    <section id="banner">
        <div class="content">
            <header>
                <h2>Welcome</h2>
                <p>Tunku Abdul Rahman University College<br />
                    Academic websites</p>
            </header>
            <span class="image"><img src="images/logo.png" alt="" /></span>
        </div>
        <a href="#one" class="goto-next scrolly">Next</a>
    </section>

    <!-- One -->
    <section id="one" class="spotlight style1 bottom">
        <span class="image fit main"><img src="images/tarc.jpg" alt="" /></span>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-12-medium">
                        <header>
                            <h2>TAR UC in a nutshell</h2>
                            <p>The background of TAR UC</p>
                        </header>
                    </div>
                    <div class="col-4 col-12-medium">
                        <p>Tunku Abdul Rahman University College (‘TAR UC’) was established
                            in 1969 as TAR College with the focus of providing tertiary
                            education opportunities for young Malaysians regardless of race,
                            class and creed who were seeking quality education as well as
                            meeting the rising demand for human capital from businesses
                            and industries. </p>
                    </div>
                    <div class="col-4 col-12-medium">
                        <p>The College started with a single campus in Setapak, Kuala Lumpur
                            which is now the Main Campus. Subsequently, five branch campuses
                            were established in Penang, Perak, Johor, Pahang and Sabah.</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="#two" class="goto-next scrolly">Next</a>
    </section>

    <!-- Two -->
    <section id="two" class="spotlight style2 right">
        <span class="image fit main"><img src="images/pic03.jpg" alt="" /></span>
        <div class="content">
            <header>
                <h2>Philosophy of TAR UC</h2>

            </header>
            <p>The Tunku Abdul Rahman University College FIRMLY BELIEVES that education
                to whomsoever it is given, regardless of age, sex, race, creed or class, will bring
                benefits to the people and country.</p>

            <p>The Tunku Abdul Rahman University College FULLY REALIZES its responsibility as
                an institution of higher learning in the context of the Malaysian education system
                and its role in fulfilling the common aspirations of the Malaysian people in the
                pursuit of education.</p>


            <ul class="actions">
                <li><a href="https://www.tarc.edu.my/" class="button">Learn More</a></li>
            </ul>
        </div>
        <a href="#three" class="goto-next scrolly">Next</a>
    </section>

    <!-- Three -->
    <section id="three" class="spotlight style3 left">
        <span class="image fit main bottom"><img src="images/pic04.jpg" alt="" /></span>
        <div class="content">
            <header>
                <h2>Vision of TAR UC</h2>

            </header>
            <p>The Tunku Abdul Rahman University College shall be a DISTINGUISHED institution
                of higher learning acknowledged locally, nationally and globally for its excellence in
                providing opportunities for intellectual, personal and professional development and
                growth of its students by fostering their inquiring, creative and innovative minds to
                succeed in life.</p>

            <ul class="actions">
                <li><a href="https://www.tarc.edu.my/" class="button">Learn More</a></li>
            </ul>
        </div>
        <a href="#four" class="goto-next scrolly">Next</a>
    </section>
    <!-- Four -->
    <section id="four" class="spotlight style2 right">
        <span class="image fit main"><img src="images/pic03.jpg" alt="" /></span>
        <div class="content">
            <header>
                <h2>Mission of TAR UC</h2>

            </header>
            <p>The Tunku Abdul Rahman University College is COMMITTED to complement and
                supplement the efforts of the Government in providing quality education and
                training on a comprehensive range of disciplines and levels thereby adding to the
                development of human capital in Malaysia.</p>

            <p>The Tunku Abdul Rahman University College will FOCUS on total development of
                students to their fullest potential and its graduates shall be imbued with knowledge,
                skills, values and attributes to succeed in life and work, contributing to the
                technological, economic and social advancement of the nation.</p>


            <ul class="actions">
                <li><a href="https://www.tarc.edu.my/" class="button">Learn More</a></li>
            </ul>
        </div>
        <a href="#three" class="goto-next scrolly">Next</a>
    </section>



    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
            <li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>



<!-- Scripts -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrolly.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollex.min.js')}}"></script>
<script src="{{asset('assets/js/browser.min.js')}}"></script>
<script src="{{asset('assets/js/breakpoints.min.js')}}"></script>
<script src="{{asset('assets/js/util.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

@endsection()

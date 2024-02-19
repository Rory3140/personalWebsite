<?php
include_once '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resume</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $websiteIcon; ?>">
    <link rel="stylesheet" href="<?php echo $cssNavPath; ?>">
    <link rel="stylesheet" href="<?php echo $cssResumePath; ?>">

    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav id="nav-bar">
        <div id="menu-icon" onclick="openCloseMenu()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <a href="<?php echo $homePath; ?>">
            <img id="home-icon" src="<?php echo $homeIcon; ?>" alt="Home Icon">
        </a>
    </nav>

    <div id="nav-menu">
        <a class="button" onclick="scrollAbove('about-me')">About Me</a>
        <a class="button" onclick="scrollAbove('education')">Education</a>
        <a class="button" onclick="scrollAbove('work-experience')">Work Experience</a>
        <a class="button" onclick="scrollAbove('contact')">Contact</a>
    </div>

    <header>
        <div class="card">
            <div class="card-content card-front">
                <img src="<?php echo $profilePicture; ?>" alt="Profile Icon">
                <div>
                    <h1>Rory Wood</h1>
                    <p>Siena College</p>
                </div>
                <div class="social-links">
                    <a href="https://github.com/Rory3140" target=”_blank”>
                        <i class="devicon-github-original"></i>
                    </a>
                    <a href="mailto:rorywood9@live.com" target=”_blank”>
                        <i class="fa fa-envelope"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/rory-s-wood/" target=”_blank”>
                        <i class="devicon-linkedin-plain"></i>
                    </a>
                </div>
            </div>

            <div class="card-content card-back">
                <div class="coding-content java">
                    <h2>Java</h2>
                    <p>
                        I have been coding in Java for over six years now making it the programming
                        language that I am most proficient in. Over the years I have completed numerous
                        projects using Java. These have ranged from simple and advanced algorithms to a
                        quiz application completed using Java Swing which boasted a comprehensive login
                        and registration as well as seamless integration with a back-end database.
                    </p>
                </div>
                <div class="coding-content php">
                    <h2>PHP</h2>
                    <p>
                        I gained proficiency in PHP through self-study. After learning the fundamentals
                        of HTML, CSS, and JavaScript in my web development course, I took on numerous
                        projects that demanded dynamic website functionality, thus necessitating the
                        utilization of PHP for coding purposes.
                    </p>
                </div>
                <div class="coding-content javascript">
                    <h2>Javascript</h2>
                    <p>
                        I first gained exposure to JavaScript in my web development class at university
                        where I learned the fundamentals of the language and the basics of the React
                        framework. Since then, I have taught myself more advanced aspects of JavaScript
                        to complete various front-end and back-end projects.
                    </p>
                </div>
                <div class="coding-content react">
                    <h2>React</h2>
                    <p>
                        I have been using React for over a year now and have completed numerous projects
                        using the framework. I have found React to be an incredibly powerful tool for
                        creating dynamic and responsive web applications and have enjoyed using it to
                        create a variety of projects.
                </div>
                <div class="coding-content python">
                    <h2>Python</h2>
                    <p>
                        I picked up Python myself at secondary school and continued it in university in a
                        robotics class.I enjoy using Python for web automation and creating customized
                        scripts to streamline processes.
                    </p>
                </div>
                <div class="coding-content c">
                    <h2>C/C++</h2>
                    <p>
                        Through self-teaching I have gained a strong understanding of C++ and its similarities
                        to C have allowed me to quickly adapt to coding at a high level. I have used C++ mainly
                        for developing applications and game development which has allowed me to utilize my
                        skills in creative and practical ways.
                    </p>
                </div>
                <div class="return-button" onclick="flip()">
                    <i class="fa fa-arrow-left"></i>
                </div>
            </div>
        </div>

        <div class="language-icons">
            <div id="java" onclick="flipCard(this)"><i class="devicon-java-plain"></i></div>
            <div id="php" onclick="flipCard(this)"><i class="devicon-php-plain"></i></div>
            <div id="javascript" onclick="flipCard(this)"><i class="devicon-javascript-plain"></i></div>
            <div id="react" onclick="flipCard(this)"><i class="devicon-react-plain"></i></div>
            <div id="python" onclick="flipCard(this)"><i class="devicon-python-plain"></i></div>
            <div id="c" onclick="flipCard(this)"><i class="devicon-c-plain"></i></div>
        </div>
        <div class="scroll-button" onclick="scrollAbove('about-me')">
            <div class="scroll-icon"></div>
        </div>
    </header>

    <main>
        <div class="container secondary-container" id="about-me">
            <h2 onclick="scrollAbove('about-me')">About Me</h2>
            <p>
                I am an enthusiastic, outgoing, and positive person with an eagerness to learn and
                embrace new challenges. I have had a passion for computers and technology for as long
                as I can remember - since learning Java eight years ago I have been captivated by the
                sense of creative freedom and the opportunity for critical thinking that Development
                and Coding provides. This has driven me to not only pursue a career in this field but
                also to teach myself various essential languages, expanding my understanding and
                knowledge.<br>

                <br>While coding is my true passion, I am far from a typical Computer Science student.
                I am also an avid rugby player, having represented my country with Ireland U19 and
                currently playing for both my university at Division 1 level and the New York Major
                League Rugby Academy. My experience in rugby has taught me invaluable lessons in teamwork,
                perseverance, and leadership, all of which I bring to the table when working with others
                on coding projects.
            </p>
        </div>

        <div class=" container" id="education">
            <h2 onclick="scrollAbove('education')">Education</h2>

            <h3>Siena College, New York</h3>
            <p>
                I am currently in my junior year studying at Siena College where I have been awarded
                both an Academic and a Sports Scholarship and have made the Dean's list twice in the
                past two years. I am working towards a bachelor's degree in computer science with a
                primary focus on software development and alongside this I am also minoring in business.
            </p>
            <h4>Computer Science Classes</h4>
            <div class="long-list">
                <ul>
                    <li>Web Development</li>
                    <li>Web Design</li>
                    <li>Advanced Programming</li>
                    <li>Machine Learning</li>
                    <li>Data Structures</li>
                    <li>C programming with Unix</li>
                    <li>Discrete Structures</li>
                </ul>
                <ul>
                    <li>Database Management Systems</li>
                    <li>Design and Analysis of Algorithms</li>
                    <li>Mobile App Development</li>
                    <li>Robotics</li>
                    <li>Programming Languages</li>
                    <li>Assembly Language and Computer Architecture</li>
                    <li>Intro to python</li>
                </ul>
            </div>
            <div class="spacer"></div>
            <h3>Bangor Grammar School, Northern Ireland</h3>
            <p>
                Prior to college I attended Bangor Grammar School where I began
                studying Computer Science at GCSE level and continued it into my
                A-Levels where I achieved an A* Grade.
            </p>
            <div class="spacer"></div>
        </div>

        <div class="container secondary-container" id="work-experience">
            <h2 onclick="scrollAbove('work-experience')">Work Experience</h2>

            <h3>
                Student Assistant - Siena College Computer Science Department
            </h3>
            <h4>2022 - Present</h4>
            <p>
                While at college I have an on-campus job in the computer science
                department where I assist the professors in a diverse range of
                tasks such as conducting research and providing guidance to fellow
                students through tutoring sessions.
            </p>
            <div class="spacer"></div>
            <h3>
                Student Tutor - Siena College Computer Science Department
            </h3>
            <h4>2023 - Present</h4>
            <p>
                At college I also have another on-campus job as a student tutor for
                the Advanced Programming and Intro to Java classes in the computer
                science department after being recommended for the job by my professors.
                The job mainly consists of students from these classes booking
                appointments with me and I assist the students with work and explain
                various concepts to them.
            </p>
            <div class="spacer"></div>
            <h3>Telephone Interviewer - Mango Direct Marketing, Bangor</h3>
            <h4>2022</h4>
            <p>
                I worked with various clients and customers in an office
                environment where I was conducting marketing/research surveys and
                promoting a variety of products to new and existing clients.
                Through this experience, I was able to refine my sales techniques
                and customer service skills while also gaining a deeper
                understanding of the marketing strategies and business practices
                required to succeed in a competitive market.
            </p>
            <div class="spacer"></div>
            <h3>Floor Staff/Bar Staff - The Stables, Groomsport</h3>
            <h4>2019 - 2021</h4>
            <p>
                This includes all areas of customer service in a busy restaurant
                including taking orders, serving, preparing bills and taking
                payment. Also includes checking stock and dealing with customer
                complaints or issues.
            </p>
            <div class="spacer"></div>
        </div>

        <div class="container" id="contact">
            <h2 onclick="scrollAbove('contact')">Contact</h2>
            <p class="contact-info">If you would like to get in touch with me, please feel free to contact me using the details below:</p>
            <p class="contact-info">Email: <a href="mailto:rorywood9@live.com" target=”_blank”>rorywood9@live.com</a></p>
            <p class="contact-info">UK Phone: +44 7539 801415</p>
            <p class="contact-info">US Phone: +1 (518) 528 0555</p>
            <div class="spacer"></div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Rory Wood</p>
        <p>Email: <a href="mailto:rorywood9@live.com" target=”_blank”>rorywood9@live.com</a></p>
        <p>Website: <a href="http://www.rorywood.co.uk" target=”_blank”>www.rorywood.co.uk</a></p>
    </footer>

    <script src="<?php echo $jsResumePath; ?>"></script>
</body>

</html>
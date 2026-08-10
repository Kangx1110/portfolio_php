<?php

require_once __DIR__ . '/config.php';
$skills = [];
$projects = [];
$skillResult = $conn->query(
    "SELECT id, name, level, icon
     FROM skills
     ORDER BY id DESC"
);
if ($skillResult) {
    while ($row = $skillResult->fetch_assoc()) {
        $skills[] = $row;
    }
}
$projectResult = $conn->query(
    "SELECT id, title, description, image_url, project_url, tech_stack
     FROM projects
     ORDER BY id DESC"
);
if ($projectResult) {
    while ($row = $projectResult->fetch_assoc()) {
        $projects[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Portfolio | Developer</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >
</head>
<body>

<header class="navbar">
    <div class="container nav-inner">
        <a
            class="logo"
            href="#home"
        >
            Portfolio<span>.</span>
        </a>
        <nav>
            <a href="#home">
                Home
            </a>
            <a href="#skills">
                Skills
            </a>
            <a href="#projects">
                Projects
            </a>
            <a href="#contact">
                Contact
            </a>
        </nav>
    </div>
</header>
<main>

<section
    id="home"
    class="hero"
>
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">
                PHP / MYSQL DEVELOPER
            </p>
            <h1>
                Xin chào, mình là
                <span>
                    Dũng
                </span>.
            </h1>
            <p class="hero-text">
                Mình xây dựng website và ứng dụng web
                bằng PHP, MySQL, HTML, CSS và JavaScript.

                Portfolio này được xây dựng bằng
                PHP + MySQL và chạy trên XAMPP.
            </p>
            <div class="actions">
                <a
                    class="btn primary"
                    href="#projects"
                >
                    Xem dự án
                </a>
                <a
                    class="btn secondary"
                    href="#contact"
                >
                    Liên hệ
                </a>
            </div>
        </div>
        <div class="hero-card">
            <div class="avatar">
                    <img
                        src="assets/images/avatar.jpg"
                        alt="Ảnh đại diện"
                    >
                </div>
            <h2>
                Web Developer
            </h2>
            <p>
                PHP - MySQL - JavaScript - Java
            </p>
        </div>
    </div>
</section>

<section
    id="skills"
    class="section"
>
    <div class="container">

        <p class="eyebrow">
            MY SKILLS
        </p>
        <h2 class="section-title">
            Kỹ năng
        </h2>
        <div class="cards">
            <?php foreach ($skills as $skill): ?>
                <article class="skill-card">
                    <div class="skill-icon">
                        <?= htmlspecialchars(
                            $skill['icon'] ?: '◆'
                        ) ?>
                    </div>
                    <div class="skill-info">
                        <h3>
                            <?= htmlspecialchars(
                                $skill['name']
                            ) ?>

                        </h3>
                        <div class="bar">
                            <span
                                style="width: <?= (int)$skill['level'] ?>%"
                            ></span>
                        </div>
                        <small>
                            <?= (int)$skill['level'] ?>%
                        </small>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section
    id="projects"
    class="section alt"
>
    <div class="container">
        <p class="eyebrow">
            MY WORK
        </p>
        <h2 class="section-title">
            Dự án
        </h2>
        <div class="project-grid">
            <?php foreach ($projects as $project): ?>
                <article class="project-card">
                    <?php if (!empty($project['image_url'])): ?>
                        <img
                            src="<?= htmlspecialchars(
                                $project['image_url']
                            ) ?>"
                            alt="<?= htmlspecialchars(
                                $project['title']
                            ) ?>"
                        >
                    <?php else: ?>
                        <div class="project-placeholder">

                            PROJECT

                        </div>
                    <?php endif; ?>
                    <div class="project-body">
                        <h3>
                            <?= htmlspecialchars(
                                $project['title']
                            ) ?>
                        </h3>
                        <p>
                            <?= nl2br(
                                htmlspecialchars(
                                    $project['description']
                                )
                            ) ?>
                        </p>
                        <div class="tags">
                            <?php
                            $tags = array_filter(
                                array_map(
                                    'trim',
                                    explode(
                                        ',',
                                        $project['tech_stack']
                                    )
                                )
                            );
                            ?>
                            <?php foreach ($tags as $tag): ?>
                                <span>
                                    <?= htmlspecialchars($tag) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        <?php if (!empty($project['project_url'])): ?>
                            <a
                                class="project-link"
                                href="<?= htmlspecialchars(
                                    $project['project_url']
                                ) ?>"
                                target="_blank"
                                rel="noopener"
                            >

                                Xem dự án →

                            </a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section
    id="contact"
    class="section"
>
    <div class="container contact-grid">
        <div>
            <p class="eyebrow">
                GET IN TOUCH
            </p>
            <h2 class="section-title">
                Liên hệ với tôi
            </h2>
            <p class="contact-text">
                Bạn có dự án hoặc cơ hội hợp tác?
                Hãy gửi tin nhắn,
                tôi sẽ phản hồi sớm.
            </p>
            <div class="contact-info">
                <p>
                    <strong>Email:</strong>
                    duqtruoq1110@gmail.com
                </p>
                <p>
                    <strong>GitHub:</strong>
                    https://github.com/Kangx1110
                </p>
                <p>
                    <strong>Location:</strong>
                    Vietnam
                </p>
            </div>
        </div>
        <form
            class="contact-form"
            action="contact_handler.php"
            method="POST"
        >
            <label>

                Họ và tên

                <input
                    type="text"
                    name="name"
                    required
                    maxlength="100"
                >
            </label>
            <label>

                Email

                <input
                    type="email"
                    name="email"
                    required
                    maxlength="150"
                >
            </label>
            <label>

                Tiêu đề

                <input
                    type="text"
                    name="subject"
                    required
                    maxlength="200"
                >
            </label>
            <label>

                Nội dung

                <textarea
                    name="message"
                    rows="6"
                    required
                    maxlength="2000"
                ></textarea>

            </label>
            <button
                class="btn primary"
                type="submit"
            >

                Gửi tin nhắn
            </button>
        </form>
    </div>
</section>
</main>

<footer>
    <div class="container">

        © <?= date('Y') ?>

        Dũng.

        Built with PHP + MySQL.
    </div>
</footer>
</body>
</html>
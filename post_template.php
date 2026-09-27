<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modern Post Content UI</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/post_template1.css">
    <link rel="stylesheet" href="css/dialog.css">

</head>


<body>


    <!-- =========================
         HERO SECTION
    ========================== -->

    <section class="hero">

        <!-- HERO IMAGE -->
        <img src="" alt="Hero Image" class="hero-image">

        <!-- DARK OVERLAY -->
        <div class="hero-overlay"></div>


        <!-- HERO CONTENT -->
        <div class="hero-content">

            <h1></h1>
            <p></p>

        </div>

    </section>



    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <main class="container main-wrapper">

        <div class="row g-4">

            <!-- =========================
                 LEFT CONTENT
            ========================== -->

            <div class="col-lg-8">

                <!-- POST CARD -->

                <article class="post-card">

                    <!-- Published Date -->

                    <div class="post-date">
                        <i class="fa-solid fa-calendar"></i>
                    </div>
                    <!-- MAIN CONTENT -->

                </article>



                <!-- =========================
                     COMMENT SECTION
                ========================== -->

                <section class="comment-card">

                    <h3 class="comment-title">
                        <i class="fa-solid fa-comments"></i>
                        Add Your Comment
                    </h3>


                    <div class="comment-form">

                        <textarea
                            placeholder="Write your comment here..."
                            id="comment"
                        ></textarea>


                        <button type="button" class="comment-btn">
                            <i class="fa-solid fa-paper-plane"></i>
                            Submit Comment
                        </button>

                    </div>

                </section>

            </div>

            <!-- =========================
                 RIGHT SIDEBAR
            ========================== -->

            <aside class="col-lg-4">

                <div class="sidebar-card">

                    <!-- Sidebar Title -->

                    <h4 class="sidebar-title">
                        <i class="fa-solid fa-fire"></i>
                        Related Posts
                    </h4>



                    <!-- Related Post 1 -->

                    <div class="related-post">

                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=500&auto=format&fit=crop" alt="Bootstrap Grid">

                        <div>
                            <h6>Learn Bootstrap Grid System</h6>
                            <small>15 May 2026</small>
                        </div>

                    </div>



                    <!-- Related Post 2 -->

                    <div class="related-post">

                        <img src="https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?q=80&w=500&auto=format&fit=crop" alt="CSS Animation">

                        <div>
                            <h6>Advanced CSS Animation Tricks</h6>
                            <small>12 May 2026</small>
                        </div>

                    </div>



                    <!-- Related Post 3 -->

                    <div class="related-post">

                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=500&auto=format&fit=crop" alt="Responsive Website">

                        <div>
                            <h6>Create Responsive Website Layout</h6>
                            <small>08 May 2026</small>
                        </div>

                    </div>


                </div>

            </aside>


        </div>

    </main>

    <?php include'dialog.php';?>

    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Custom JS -->

    <script src="JS/dialog.js"></script>
    <script src="JS/security.js"></script>
    <script src="JS/add_comments.js"></script>
    <script src="JS/post_template.js"></script>

</body>

</html>
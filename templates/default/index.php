<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator's Social Links</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="styles.css" rel="stylesheet">-->
    <style>
        .oapp-body {
            font-family: 'Arial', sans-serif;
            padding: 20px 0;
        }

        .oapp-profile-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .oapp-name {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .oapp-social-btn {
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            padding: 16px 24px;
            margin: 8px 0;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-decoration: none;
        }

        .oapp-social-btn svg {
            width: 24px;
            height: 24px;
        }

        .oapp-social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .oapp-social-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .oapp-facebook-btn {
            background-color: #1877f2;
            color: white;
        }
        .oapp-facebook-btn:hover {
            background-color: #1664d9;
            color: white;
        }

        .oapp-linkedin-btn {
            background-color: #0077b5;
            color: white;
        }
        .oapp-linkedin-btn:hover {
            background-color: #006399;
            color: white;
        }

        .oapp-twitter-btn {
            background-color: #1da1f2;
            color: white;
        }
        .oapp-twitter-btn:hover {
            background-color: #1a8cd8;
            color: white;
        }

        .oapp-email-btn {
            background-color: #ea4335;
            color: white;
        }
        .oapp-email-btn:hover {
            background-color: #d33828;
            color: white;
        }

        .oapp-website-btn {
            background-color: #333333;
            color: white;
        }
        .oapp-website-btn:hover {
            background-color: #262626;
            color: white;
        }

        .oapp-tiktok-btn {
            background-color: #000000;
            color: white;
        }
        .oapp-tiktok-btn:hover {
            background-color: #1a1a1a;
            color: white;
        }

        @media (max-width: 768px) {
            .oapp-social-btn {
                padding: 14px 20px;
                font-size: 1.1rem;
            }

            .oapp-name {
                font-size: 2rem;
            }
        }
    </style>
    <?php Dj_CMS_Hooks::doAction( 'app.page.html.head' ); ?>
</head>
<body class="oapp-body oapp-option-1">
    <?php Dj_CMS_Hooks::doAction( 'app.page.html.body.start' ); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center mt-5">
                    <img src="https://via.placeholder.com/150" alt="Profile Picture"
                         class="rounded-circle mb-3 oapp-profile-pic">
                    <h1 class="mb-4 oapp-name">John Doe</h1>
                    <div class="d-grid gap-3">
                        <a href="https://facebook.com/johndoe" class="btn btn-lg oapp-social-btn oapp-facebook-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                            Facebook
                        </a>
                        <a href="https://linkedin.com/in/johndoe" class="btn btn-lg oapp-social-btn oapp-linkedin-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                            LinkedIn
                        </a>
                        <a href="https://twitter.com/johndoe" class="btn btn-lg oapp-social-btn oapp-twitter-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                            </svg>
                            Twitter
                        </a>
                        <a href="mailto:john@example.com" class="btn btn-lg oapp-social-btn oapp-email-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                            Email
                        </a>
                        <a href="https://johndoe.com" class="btn btn-lg oapp-social-btn oapp-website-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                <path d="M2 12h20"></path>
                            </svg>
                            Website
                        </a>
                        <a href="https://tiktok.com/@johndoe" class="btn btn-lg oapp-social-btn oapp-tiktok-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"></path>
                            </svg>
                            TikTok
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php Dj_CMS_Hooks::doAction( 'app.page.html.body.end' ); ?>
</body>
</html>


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
    <?php Dj_App_Hooks::doAction( 'app.page.html.head' ); ?>
</head>
<body class="oapp-body oapp-option-1">
    <?php Dj_App_Hooks::doAction( 'app.page.html.body.start' ); ?>

    <?php
    $ctx = Dj_App_Util::data('plugin_social_links_data');
    $social_networks = $ctx['social_networks'];
    $profile_name = $ctx['profile_name'];
    $profile_image = $ctx['profile_image'];
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center mt-5">
                    <?php if (!empty($profile_image)) : ?>
                        <img src="<?php echo htmlspecialchars($profile_image); ?>"
                         alt="Profile Picture"
                         class="rounded-circle mb-3 oapp-profile-pic" />
                    <?php endif; ?>

                    <h1 class="mb-4 oapp-name"><?php echo htmlspecialchars($profile_name); ?></h1>

                    <div class="d-grid gap-3">
                        <?php if (empty($social_networks)) : ?>
                            <p>No social networks enabled</p>
                        <?php endif; ?>

                        <?php foreach ($social_networks as $network => $data): ?>
                            <a href="<?php echo htmlspecialchars($data['url']); ?>" 
                               class="btn btn-lg oapp-social-btn oapp-<?php echo $network; ?>-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     width="24" 
                                     height="24" 
                                     viewBox="0 0 24 24" 
                                     fill="none"
                                     stroke="currentColor" 
                                     stroke-width="2" 
                                     stroke-linecap="round" 
                                     stroke-linejoin="round">
                                    <?php echo $data['svg']; ?>
                                </svg>
                                <?php echo ucfirst($network); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php Dj_App_Hooks::doAction( 'app.page.html.body.end' ); ?>
</body>
</html>
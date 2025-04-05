<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "karate_combat";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$login_error = "";
$register_error = "";
$register_success = "";


if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['reg_username']);
    $email = mysqli_real_escape_string($conn, $_POST['reg_email']);
    $password = $_POST['reg_password'];
    $confirm_password = $_POST['confirm_password'];
    
 
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $register_error = "All fields are required";
    } elseif ($password !== $confirm_password) {
        $register_error = "Passwords do not match";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $register_error = "Invalid email format";
    } else {
      
        $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $check_query);
        
        if (mysqli_num_rows($result) > 0) {
            $register_error = "Username or email already exists";
        } else {
        
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            
            if (mysqli_query($conn, $insert_query)) {
                $register_success = "Registration successful! You can now login.";
            } else {
                $register_error = "Error: " . mysqli_error($conn);
            }
        }
    }
}


if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['login_username']);
    $password = $_POST['login_password'];
    
    if (empty($username) || empty($password)) {
        $login_error = "Username and password are required";
    } else {
  
        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            
          
            if (password_verify($password, $user['password'])) {
             
                session_start();
                
                
                $_SESSION['user_id'] = $user['username'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['logged_in'] = true;
                
               
                header("Location: index.php");
                exit();
            } else {
                $login_error = "Invalid username or password";
            }
        } else {
            $login_error = "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karate Combat - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-red: #FF3A2F;
            --dark-bg: #0A0A0A;
            --light-text: #F5F5F5;
            --accent-gold: #FFD700;
            --card-bg: rgba(255, 255, 255, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--dark-bg);
            color: var(--light-text);
            line-height: 1.6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(45deg, rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.7)), url('hero-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .login-container {
            width: 90%;
            max-width: 900px;
            height: 600px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.3);
        }

        .login-sidebar {
            width: 40%;
            padding: 3rem;
            background: linear-gradient(135deg, #FF3A2F, #FF6B6B);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('karate-silhouette.png') no-repeat center/contain;
            opacity: 0.2;
            z-index: 0;
        }

        .login-sidebar-content {
            position: relative;
            z-index: 1;
        }

        .login-sidebar h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--light-text);
        }

        .login-sidebar p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .login-sidebar .logo {
            width: 80px;
            margin-bottom: 1.5rem;
        }

        .login-main {
            width: 60%;
            padding: 3rem;
            background: var(--dark-bg);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-tabs {
            display: flex;
            margin-bottom: 2rem;
        }

        .tab {
            padding: 0.75rem 1.5rem;
            background: none;
            border: none;
            color: var(--light-text);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            position: relative;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .tab.active {
            opacity: 1;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 1.5rem;
            width: 50%;
            height: 3px;
            background: var(--primary-red);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: rgba(245, 245, 245, 0.8);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border-radius: 10px;
            border: none;
            background: var(--card-bg);
            color: var(--light-text);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: box-shadow 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--primary-red);
        }

        .btn {
            width: 100%;
            padding: 1.25rem;
            border-radius: 10px;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-red), #FF6B6B);
            color: var(--light-text);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
        }

        .form-footer {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.9rem;
            color: rgba(245, 245, 245, 0.6);
        }

        .form-footer a {
            color: var(--primary-red);
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .error-msg {
            background: rgba(255, 58, 47, 0.1);
            color: #FF3A2F;
            padding: 0.75rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            text-align: center;
        }

        .success-msg {
            background: rgba(74, 194, 154, 0.1);
            color: #4AC29A;
            padding: 0.75rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                height: auto;
                margin: 2rem 0;
            }

            .login-sidebar, .login-main {
                width: 100%;
            }

            .login-sidebar {
                padding: 2rem;
            }

            .login-main {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-sidebar">
            <div class="login-sidebar-content">
                <img src="reg.jpeg" alt="Karate Combat" class="logo">
                <h1>Master the Art of Combat Finance</h1>
                <p>Join millions of martial arts enthusiasts in the world's first combat sports decentralized autonomous organization.</p>
            </div>
        </div>
        <div class="login-main">
            <div class="login-tabs">
                <button class="tab active" data-tab="login">Login</button>
                <button class="tab" data-tab="register">Register</button>
            </div>
            
            <div id="login" class="tab-content active">
                <?php if (!empty($login_error)): ?>
                    <div class="error-msg"><?php echo $login_error; ?></div>
                <?php endif; ?>
                
                <form action="" method="post">
                    <div class="form-group">
                        <label for="login_username">Username or Email</label>
                        <input type="text" name="login_username" id="login_username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password</label>
                        <input type="password" name="login_password" id="login_password" class="form-control" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
                <div class="form-footer">
                    <p>Don't have an account? <a href="#" class="switch-tab" data-tab="register">Register now</a></p>
                </div>
            </div>
            
            <div id="register" class="tab-content">
                <?php if (!empty($register_error)): ?>
                    <div class="error-msg"><?php echo $register_error; ?></div>
                <?php endif; ?>
                
                <?php if (!empty($register_success)): ?>
                    <div class="success-msg"><?php echo $register_success; ?></div>
                <?php endif; ?>
                
                <form action="" method="post">
                    <div class="form-group">
                        <label for="reg_username">Username</label>
                        <input type="text" name="reg_username" id="reg_username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_email">Email</label>
                        <input type="email" name="reg_email" id="reg_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_password">Password</label>
                        <input type="password" name="reg_password" id="reg_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
                <div class="form-footer">
                    <p>Already have an account? <a href="#" class="switch-tab" data-tab="login">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            const switchTabs = document.querySelectorAll('.switch-tab');
   
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabId = tab.getAttribute('data-tab');
                    
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));
                   
                    tab.classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });
            

            switchTabs.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const tabId = link.getAttribute('data-tab');
                    
                   
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));
                    
                
                    document.querySelector(`.tab[data-tab="${tabId}"]`).classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
</body>
</html>

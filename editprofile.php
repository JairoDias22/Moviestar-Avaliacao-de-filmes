<?php
  // Inclui o header da aplicação (menu, sessão, conexão com banco, variáveis globais)
  require_once("templates/header.php");

  // Importa as classes relacionadas ao usuário
  require_once("models/User.php");
  require_once("dao/UserDAO.php");

  // Cria instâncias do Model e do DAO
  $user = new User();
  $userDao = new UserDAO($conn, $BASE_URL);

  // Verifica se o usuário está autenticado (true = redireciona se não estiver logado)
  $userData = $userDao->verifyToken(true);

  // Obtém o nome completo do usuário
  $fullName = $user->getFullName($userData);

  // Define imagem padrão caso o usuário não tenha foto
  if(empty($userData->image)) {
    $userData->image = "user.png";
  }
?>

<!-- ================================
     CONTAINER PRINCIPAL DA PÁGINA
================================ -->
<div id="main-container" class="container-fluid edit-profile-page">
  <div class="col-md-12">

    <!-- ================================
         FORMULÁRIO DE ATUALIZAÇÃO DE PERFIL
    ================================= -->
    <div class="profile-forms">
    <form class="formulario-perfil" action="<?= $BASE_URL ?>user_process.php"
          method="POST"
          enctype="multipart/form-data">

      <!-- Define o tipo da ação -->
      <input type="hidden" name="type" value="update">

      <div class="row">

        <!-- COLUNA 1 - DADOS BÁSICOS -->
        <div class="col-md-4">

          <!-- Nome do usuário -->
          <h1><?= $fullName ?></h1>

          <!-- Texto explicativo -->
          <p class="page-description">
            Altere seus dados no formulário abaixo:
          </p>

          <!-- CAMPO NOME -->
          <div class="form-group w-100 bt">
            <label for="name">Nome:</label>
            <input type="text"
                   class="form-control w-75"
                   id="name"
                   name="name"
                   value="<?= $userData->name ?>">
          </div>

          <!-- CAMPO SOBRENOME -->
          <div class="form-group w-100 bt">
            <label for="lastname">Sobrenome:</label>
            <input type="text"
                   class="form-control w-75"
                   id="lastname"
                   name="lastname"
                   value="<?= $userData->lastname ?>">
          </div>

          <!-- CAMPO EMAIL -->
          <div class="form-group w-100 bt">
            <label for="email">E-mail:</label>
            <input type="text"
                   class="form-control disabled w-75"
                   id="email"
                   name="email"
                   value="<?= $userData->email ?>">
          </div>

          <!-- BOTÃO PARA SALVAR ALTERAÇÕES -->
          <input type="submit"
                 class="btn btn-outline-warning w-75 bt"
                 value="Alterar">
        </div>

        <!-- COLUNA 2 - FOTO E BIO -->
        <div class="col-md-4">

          <!-- Container da imagem de perfil -->
          <div class="profile-header">

          <div class="profile-image"
              style="background-image: url('<?= $BASE_URL ?>img/users/<?= $userData->image ?>')">
          </div>

          <h2 class="profile-name"><?= $fullName ?></h2>

        </div>

          <!-- CAMPO PARA UPLOAD DE FOTO -->
          <div class="form-group perfil">
            <label for="image">Foto:</label>
            <input type="file"
                   class="form-control-file w-100"
                   name="image">
          </div>

          <!-- CAMPO BIO -->
          <div class="form-group perfil">
            <label for="bio">Sobre você:</label>
            <textarea class="form-control w-100"
                      name="bio"
                      id="bio"
                      rows="5"><?= $userData->bio ?></textarea>
          </div>

        </div>
      </div>
    </form>


  <!-- DIVISOR -->
  <hr class="perfil-divider">

    <!-- ================================
         FORMULÁRIO DE ALTERAÇÃO DE SENHA
    ================================= -->
    <div class="formulario-senha" >
    <div class="row" id="change-password-container">
      <div class="col-md-6">

        <h2>Alterar a senha:</h2>

        <p class="page-description">
          Digite a nova senha e confirme:
        </p>

        <form action="<?= $BASE_URL ?>user_process.php"
              method="POST">

          <!-- Define o tipo da ação -->
          <input type="hidden" name="type" value="changepassword">

          <!-- CAMPO NOVA SENHA -->
          <div class="form-group bt">
            <label for="password">Senha:</label>
            <input type="password"
                   class="form-control w-75"
                   id="password"
                   name="password">
          </div>

          <!-- CAMPO CONFIRMAÇÃO DE SENHA -->
          <div class="form-group bt">
            <label for="confirmpassword">Confirmação de senha:</label>
            <input type="password"
                   class="form-control w-75"
                   id="confirmpassword"
                   name="confirmpassword">
          </div>

          <!-- BOTÃO PARA ALTERAR SENHA -->
          <input type="submit"
                 class="btn btn-outline-warning w-75 bt"
                 value="Alterar Senha">
        </form>
      </div>
    </div>
    </div>
   </div>
  </div>
</div>

<?php
  // Inclui o footer da aplicação
  require_once("templates/footer.php");
?>
<?php include dirname(__FILE__) . "/partials/header.php"; ?>
<main class="max-w-screen-lg mx-auto flex justify-center pt-[20vh]">
  <form>
    <sl-card class="card-header">
      <div slot="header" class="font-bold text-center">
        Login
      </div>
      <div class="flex flex-col gap-4">
        <sl-input placeholder="Email" label="Email"></sl-input>
        <sl-input type="password" placeholder="Password" password-toggle label="Password"></sl-input>
      </div>
      <div slot="footer">
        <sl-button variant="primary" type="submit" class="w-full">Log in</sl-button>
      </div>
    </sl-card>
  </form>
</main>
<?php include dirname(__FILE__) . "/partials/footer.php"; ?>

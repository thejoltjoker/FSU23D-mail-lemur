<?php include "partials/header.php"; ?>
<main class="max-w-screen-lg mx-auto flex justify-center pt-[20vh]">
  <form>
    <sl-card class="card-header">
      <div slot="header" class="font-bold text-center">
        Sign up
      </div>
      <div class="flex flex-col gap-4">
        <sl-input placeholder="John Doe" label="Name" name="name"></sl-input>
        <sl-input placeholder="john.doe@example.com" label="Email" name="email"></sl-input>
        <sl-input type="password" placeholder="••••••••••••" password-toggle label="Password" name="password"></sl-input>
        <sl-radio-group label="Select an option" name="a" value="subscriber">
          <sl-radio-button value="subscriber">Subscriber</sl-radio-button>
          <sl-radio-button value="customer">Customer</sl-radio-button>
        </sl-radio-group>
      </div>
      <div slot="footer">
        <sl-button variant="primary" type="submit" class="w-full">Sign up</sl-button>
      </div>
    </sl-card>
  </form>
</main>
<?php include "partials/footer.php"; ?>

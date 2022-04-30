<template>
    <div class="background">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="login">
                <form>
                    <label for="chk" aria-hidden="true">ورود</label>
                    <input type="text" name="code" placeholder="کد پرسنلی" required="">
                    <input type="password" name="pswd" placeholder="رمز عبور" required="">
                    <button>ورود</button>
                </form>

            </div>

            <div class="signup">
                <form>
                    <label for="chk" aria-hidden="true">ثبت نام</label>
                    <input type="text" name="code" placeholder="کد پرسنلی" required="">
                    <input type="password" name="pswd" placeholder="رمز عبور" required="">
                    <input type="password" name="pswd-confirm" placeholder="تکرار رمز عبور" required="">
                    <button>ثبت نام</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",

}
</script>

<style scoped>
.background{
    width: 100%;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    font-family: 'Jost', sans-serif;
    background: linear-gradient(to bottom, #192c36, #72b0d3, #192c36);}
.main {
    width: 350px;
    height: 500px;
    overflow: hidden;
    background: linear-gradient(to bottom, #192c36, #72b0d3, #192c36);
    border-radius: 10px;
    box-shadow: 0px 9px 26px #000;
}

#chk {
    display: none;
}

.login {
    position: relative;
    width: 100%;
    height: 100%;
}

label {
    color: #fff;
    font-size: 2.3em;
    justify-content: center;
    display: flex;
    margin: 60px;
    font-weight: bold;
    cursor: pointer;
    transition: .5s ease-in-out;
}

input {
    width: 60%;
    height: 35px;
    background: #e0dede;
    justify-content: center;
    display: flex;
    margin: 20px auto;
    padding: 10px;
    border: none;
    outline: none;
    border-radius: 5px;
}

button {
    width: 60%;
    height: 40px;
    margin: 10px auto;
    justify-content: center;
    display: block;
    color: #fff;
    background: #2ebcee;
    font-size: 1em;
    font-weight: bold;
    margin-top: 20px;
    outline: none;
    border: none;
    border-radius: 5px;
    transition: .2s ease-in;
    cursor: pointer;
}

button:hover {
    background: #01ccff;
}

.signup {
    height: 460px;
    background: #eee;
    border-radius: 60% / 10%;
    transform: translateY(-180px);
    transition: .8s ease-in-out;
}

.signup label {
    color: #2eb2ff;
    transform: scale(.6);
}

#chk:checked ~ .signup {
    transform: translateY(-500px);
}

#chk:checked ~ .signup label {
    transform: scale(1);
}

#chk:checked ~ .login label {
    transform: scale(.6);
}

</style>

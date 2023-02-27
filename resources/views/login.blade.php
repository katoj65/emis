<body style="margin:0; font-family: sans-serif;">
    <div style="background: #29347a; !important; height: 100%; width: 100%;">
        <div style="height:60px;"></div>
        <center>
            <form method="POST" action="/login">
                <div style="text-align:center;">
                    <strong style="color:white;font-weight:bold;font-size:50px;"
                        >CEMIS</strong
                    >
                </div>
                <div style="height:40px;"></div>
                <div
                    style="width: 460px; height: 400px;background-color: #fff; border-radius: 5px; "
                >
                    <div style="height: 300px; padding: 20px;">
                        <span
                            style="font-size: 28px; font-weight: bold; border-bottom: solid 2px #ddd; padding-bottom: 20px;"
                        >
                            Login
                        </span>
                        <div style="height: 60px;"></div>

                        @csrf
                        <input
                            type="text"
                            name="email"
                            style="width: 100%; padding:12px;border-radius: 4px; border: solid 1px #ddd;"
                            value="school@emis.com"
                        />
                        <div style="height: 50px;"></div>
                        <input
                            type="text"
                            name="password"
                            style="width: 100%; padding:12px;border-radius: 4px;border: solid 1px #ddd;"
                            value="secret"
                        />
                        <div
                            style="height: 50px;text-align: left;padding-top: 14px;"
                        >
                            <input
                                id="remember"
                                v-model="form.remember"
                                class="mr-1"
                                type="checkbox"
                            />
                            <span class="text-sm">Remember Me</span>
                        </div>
                    </div>
                    <div
                        style="background-color:#ddd;padding: 20px; height:60px;text-align: left;padding-top:6px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; "
                    >
                        <div style="height: 20px;"></div>
                        Forget password
                        <input
                            type="submit"
                            value="Login"
                            style="float: right; padding: 10px; background: #29347a;  color: #fff; border:none ; font-size: 16px; border-radius: 4px; cursor: pointer;"
                        />
                    </div>
                </div>
            </form>
        </center>
    </div>
</body>

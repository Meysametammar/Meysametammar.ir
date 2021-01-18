import { useState } from "react";
import { Form, Input, Button, Checkbox } from "antd";
import { UserOutlined, LockOutlined } from "@ant-design/icons";
import axios from "axios";
import { useRouter } from "next/router";
import styles from "./styles.module.scss";
import BaseLayout from "~/components/layouts/BaseLayout";
import Api from "~/controller/Api";
import Auth from "~/controller/Auth";
import createPersistedState from "use-persisted-state";

const breadCrumbs = [
    {
        title: "home",
        href: "/"
    },
    {
        title: "login",
        href: "/login"
    }
];

const Login = () => {
    const useCounterState = createPersistedState("count");
    const [count, setCount] = useCounterState(0);
    const router = useRouter();
    const onFinish = values => {
        setCount(currentCount => currentCount + 1);
        // console.log(count);
        axios.get(`${process.env.API_ENDPOINT}sanctum/csrf-cookie`).then(() => {
            Api.post("/api/login", {
                phone: values.phone,
                password: values.password
            })
                .then(res => {
                    Auth.login(res.data.token);
                    // router.push("/");
                    // Api.get("/api/user")
                    //     .then(user => {
                    //         console.log(user);
                    //     })
                    //     .catch(e => {
                    //         console.log("WTH");
                    //     });
                })
                .catch(e => console.log(e));
        });
    };

    return (
        <BaseLayout breadCrumbs={breadCrumbs}>
            <Form
                name="login"
                className="login-form "
                initialValues={{ remember: true }}
                onFinish={onFinish}
                size="large"
                wrapperCol={{ md: 20, xs: 24 }}
            >
                <Form.Item
                    name="phone"
                    rules={[{ required: true, message: "لطفا تلفن همراه خود را وارد کنید!" }]}
                >
                    <Input
                        prefix={<UserOutlined className="site-form-item-icon" />}
                        placeholder="تلفن همراه"
                    />
                </Form.Item>
                <Form.Item
                    name="password"
                    rules={[{ required: true, message: "لطفا پسورد را وارد کنید!" }]}
                >
                    <Input
                        prefix={<LockOutlined className="site-form-item-icon" />}
                        type="password"
                        placeholder="پسورد"
                    />
                </Form.Item>
                <Form.Item>
                    {/* <a className="login-form-forgot" href="">
                        رمز عبور خود را فراموش کردید ؟
                    </a> */}
                    <Form.Item name="remember" valuePropName="checked" noStyle>
                        <Checkbox>مرا به خاطر بسپار</Checkbox>
                    </Form.Item>
                </Form.Item>

                <Form.Item>
                    <Button type="primary" htmlType="submit" className="login-form-button">
                        ورود
                    </Button>
                </Form.Item>
            </Form>
        </BaseLayout>
    );
};

export default Login;

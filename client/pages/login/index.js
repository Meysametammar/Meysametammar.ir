import { useState } from "react";
import { Form, Input, Button, Checkbox } from "antd";
import { UserOutlined, LockOutlined } from "@ant-design/icons";
import Link from "next/link";
import styles from "./styles.module.scss";
import BaseLayout from "../../components/layouts/BaseLayout";

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
    const onFinish = values => {
        console.log("Success:", values);
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
                    name="username"
                    rules={[{ required: true, message: "لطفا نام کاربری را وارد کنید!" }]}
                >
                    <Input
                        prefix={<UserOutlined className="site-form-item-icon" />}
                        placeholder="نام کاربری"
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
                    &nbsp; یا &nbsp;<Link href="/register">ثبت نام!</Link>
                </Form.Item>
            </Form>
        </BaseLayout>
    );
};

export default Login;

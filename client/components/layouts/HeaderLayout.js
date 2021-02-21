import { Layout, Menu } from "antd";
import Link from "next/link";

const { Header } = Layout;

const header = () => {
    return (
        <Header>
            <div className="logo" />
            <Menu theme="dark" mode="horizontal" defaultSelectedKeys={["2"]}>
                <Menu.Item key="1">
                    <Link href="/login">ورود/ثبت‌نام</Link>
                </Menu.Item>
                <Menu.Item key="2">
                    <Link href="/inventory">انبار داری</Link>
                </Menu.Item>
            </Menu>
        </Header>
    );
};

export default header;

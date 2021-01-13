import { Layout, Menu, Breadcrumb } from "antd";
import PropTypes from "prop-types";
import styles from "./Base.module.scss";
import Link from "next/link";
const { Header, Content, Footer } = Layout;

const BaseLayout = ({ children, breadCrumbs }) => (
    <Layout className="layout" className={styles.layout}>
        <Header>
            <div className="logo" />
            <Menu theme="dark" mode="horizontal" defaultSelectedKeys={["2"]}>
                <Menu.Item key="1">
                    <Link href="/login">login</Link>
                </Menu.Item>
                <Menu.Item key="2">nav 2</Menu.Item>
                <Menu.Item key="3">nav 3</Menu.Item>
            </Menu>
        </Header>
        <Content style={{ padding: "0 50px" }}>
            <Breadcrumb style={{ margin: "16px 0" }}>
                {breadCrumbs.map((bread_crumb, index) => {
                    return (
                        <Breadcrumb.Item key={index}>
                            <Link href={bread_crumb.href}>
                                <a>{bread_crumb.title}</a>
                            </Link>
                        </Breadcrumb.Item>
                    );
                })}
            </Breadcrumb>
            <div className="site-layout-content">{children}</div>
        </Content>
        <Footer style={{ textAlign: "center" }}>Ant Design ©2018 Created by Ant UED</Footer>
    </Layout>
);
BaseLayout.propTypes = {
    children: PropTypes.element.isRequired,
    breadCrumbs: PropTypes.array.isRequired
};
export default BaseLayout;

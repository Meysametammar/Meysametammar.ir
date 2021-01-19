import { Layout, Breadcrumb } from "antd";
import PropTypes from "prop-types";
import styles from "./Base.module.scss";
import Link from "next/link";
import Footer from "./FooterLayout";
import Header from "./HeaderLayout";
const { Content } = Layout;

const BaseLayout = ({ children, breadCrumbs }) => (
    <Layout className="layout" className={styles.layout}>
        <Header />
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
        <Footer />
    </Layout>
);
BaseLayout.propTypes = {
    children: PropTypes.element.isRequired,
    breadCrumbs: PropTypes.array.isRequired
};
export default BaseLayout;

import styles from "../styles/Home.module.css";
import BaseLayout from "../components/layouts/BaseLayout";

const breadCrumbs = [
    {
        title: "home",
        href: "/"
    }
];

const Index = () => {
    return (
        <>
            <BaseLayout breadCrumbs={breadCrumbs}>
                <p>Hello World</p>
            </BaseLayout>
        </>
    );
};

export default Index;

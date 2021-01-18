import styles from "~/styles/Home.module.css";
import BaseLayout from "~/components/layouts/BaseLayout";
import Auth from "~/controller/Auth";
const breadCrumbs = [
    {
        title: "home",
        href: "/"
    }
];

const Index = () => {
    if (typeof localStorage !== "undefined") {
        console.log(Auth.token());
    }
    return (
        <>
            <BaseLayout breadCrumbs={breadCrumbs}>
                <p>Hello World</p>
            </BaseLayout>
        </>
    );
};

export default Index;

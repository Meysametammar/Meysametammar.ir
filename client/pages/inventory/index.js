import { useState } from "react";
import { Form, Input, Button, Checkbox } from "antd";
import styles from "./styles.module.scss";
import BaseLayout from "~/components/layouts/BaseLayout";
import Api from "~/controller/Api";
import Auth from "~/controller/Auth";
import createPersistedState from "use-persisted-state";
import Link from "next/link";

const breadCrumbs = [
    {
        title: "home",
        href: "/"
    },
    {
        title: "inventory",
        href: "/inventory"
    }
];

const Inventory = () => {
    return (
        <BaseLayout breadCrumbs={breadCrumbs}>
            <Link href="/inventory/new">اضافه کردن چیز</Link>
        </BaseLayout>
    );
};

export default Inventory;

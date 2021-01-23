import { useState } from "react";
import { Form, Input, Button, Checkbox, Radio, Row, Col, Upload, message } from "antd";
import styles from "./styles.module.scss";
import BaseLayout from "~/components/layouts/BaseLayout";
import Api from "~/controller/Api";
import Auth from "~/controller/Auth";
import createPersistedState from "use-persisted-state";
import Link from "next/link";
import UploadOneImage from "~/components/shared/uploadOneImage";
const breadCrumbs = [
    {
        title: "home",
        href: "/"
    },
    {
        title: "inventory",
        href: "/inventory"
    },
    {
        title: "create property",
        href: "/inventory/new"
    }
];

const Inventory = () => {
    const [form] = Form.useForm();
    const [fileId, setFileId] = useState(null);

    const formItemLayout = {
        labelCol: {
            span: 4
        },
        wrapperCol: {
            span: 20
        }
    };
    const buttonItemLayout = {
        wrapperCol: {
            span: 14,
            offset: 4
        }
    };
    return (
        <BaseLayout breadCrumbs={breadCrumbs}>
            <Form {...formItemLayout} layout="horizontal" form={form}>
                <Row>
                    <Col span={12}>
                        <div id="PropertySection">
                            <Form.Item label="کد اموال">
                                <Input placeholder="8003" />
                            </Form.Item>
                            <Form.Item label="عنوان">
                                <Input placeholder="8003" />
                            </Form.Item>
                            <Form.Item label="توضیحات">
                                <Input placeholder="8003" />
                            </Form.Item>
                            <Form.Item label="تعداد">
                                <Input placeholder="8003" />
                            </Form.Item>
                            <Form.Item label="تصویر">
                                <UploadOneImage actionName="property" setFileId={setFileId} />
                            </Form.Item>
                        </div>
                    </Col>
                    <Col span={12}>
                        <div id="OwnerSection"></div>
                        <div id="NewOwnerSection"></div>
                    </Col>
                </Row>

                <Form.Item {...buttonItemLayout}>
                    <Button type="primary">Submit</Button>
                </Form.Item>
            </Form>
        </BaseLayout>
    );
};

export default Inventory;

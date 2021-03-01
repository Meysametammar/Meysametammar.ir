import { useState } from "react";
import { Form, Input, Button, Checkbox, Radio, Row, Col, Upload, message, Select } from "antd";
import styles from "./styles.module.scss";
import BaseLayout from "~/components/layouts/BaseLayout";
import Api from "~/controller/Api";
import Auth from "~/controller/Auth";
import createPersistedState from "use-persisted-state";
import Link from "next/link";
import UploadOneImage from "~/components/shared/uploadOneImage";
import { CreateGuest } from "~/components/shared/inventory";
import QueueAnim from "rc-queue-anim";

const { Option } = Select;

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
    const [ownerView, setOwnerView] = useState({ type: null, value: null, create: false });

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

    const onCreateOwner = () => {
        setOwnerView({ ...ownerView, create: !ownerView.create });
    };
    const ownerTypeOnChange = value => {
        setOwnerView({ ...ownerView, type: value });
    };

    return (
        <BaseLayout breadCrumbs={breadCrumbs}>
            <Form {...formItemLayout} layout="horizontal" form={form}>
                <Row>
                    <Col span={12}>
                        <div id="PropertySection">
                            <Form.Item name="code" label="کد اموال">
                                <Input placeholder="8003" />
                            </Form.Item>
                            <Form.Item name="title" label="عنوان">
                                <Input placeholder="8003" />
                            </Form.Item>
                            <Form.Item name="description" label="توضیحات">
                                <Input placeholder="8003" />
                            </Form.Item>
                            <Form.Item name="count" label="تعداد">
                                <Input type="number" placeholder="1" />
                            </Form.Item>
                            <Form.Item label="تصویر">
                                <UploadOneImage actionName="property" setFileId={setFileId} />
                            </Form.Item>
                        </div>
                    </Col>
                    <Col span={12}>
                        <div id="OwnerSection">
                            <Form.Item name="owner_type" label="مالکیت فعلی">
                                <Select
                                    onChange={ownerTypeOnChange}
                                    style={{ width: 200 }}
                                    placeholder="نوع مالکیت فعلی"
                                    optionFilterProp="children"
                                >
                                    <Option value="place">مکان</Option>
                                    <Option value="user">کادر</Option>
                                    <Option value="guest">مهمان</Option>
                                    <Option value="student">متربی</Option>
                                </Select>
                            </Form.Item>
                            <Form.Item label="مالکیت فعلی">
                                <Select
                                    showSearch
                                    style={{ width: 300 }}
                                    placeholder="نوع مالکیت فعلی"
                                    optionFilterProp="children"
                                >
                                    <Option value="place">مکان</Option>
                                    <Option value="users">کادر</Option>
                                    <Option value="guest">مهمان</Option>
                                    <Option value="student">متربی</Option>
                                </Select>
                                &nbsp; یا &nbsp;
                                <Button onClick={onCreateOwner} type="primary">
                                    {ownerView.create ? "مخفی کردن" : "ایجاد"}
                                </Button>
                            </Form.Item>
                        </div>
                        <QueueAnim
                            className="demo-content"
                            key="demo"
                            animConfig={[
                                { opacity: [1, 0], translateY: [50, 0] },
                                { opacity: [1, 0], translateY: [-50, 0] }
                            ]}
                            onEnd={console.log("FUCK")}
                        >
                            {ownerView.create
                                ? [
                                      <div
                                          key="demo1"
                                          className={styles.new_owner_section + " demo-header"}
                                          id="NewOwnerSection"
                                      >
                                          {ownerView.type === "place" ? (
                                              <CreateGuest />
                                          ) : (
                                              <CreateGuest />
                                          )}
                                      </div>
                                  ]
                                : null}
                        </QueueAnim>
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

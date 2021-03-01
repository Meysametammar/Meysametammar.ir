import { useState } from "react";
import PropTypes from "prop-types";
import { Form, Input, Button, Checkbox, Radio, Row, Col, Upload, message, Select } from "antd";
import UploadOneImage from "~/components/shared/uploadOneImage";
import { LoadingOutlined, PlusOutlined } from "@ant-design/icons";
import Auth from "~/controller/Auth";

const CreateGuest = ({ setFileId }) => {
    const [form] = Form.useForm();

    return (
        <Form layout="horizontal" form={form}>
            <Form.Item name="name" label="نام و نام‌ خانوادگی">
                <Input placeholder="8003" />
            </Form.Item>
            <Form.Item name="nation_code" label="کد ملی">
                <Input placeholder="8003" />
            </Form.Item>
            <Form.Item name="phone" label="موبایل">
                <Input placeholder="8003" />
            </Form.Item>
            <Form.Item name="description" label="توضیحات">
                <Input type="number" placeholder="1" />
            </Form.Item>
            <Form.Item label="تصویر">
                <Row align="middle">
                    <Col span="12">
                        <UploadOneImage actionName="property" setFileId={setFileId} />
                    </Col>
                    <Col>
                        <Button type="primary">Submit</Button>
                    </Col>
                </Row>
            </Form.Item>

            <Form.Item></Form.Item>
        </Form>
    );
};

CreateGuest.propTypes = {};

export default CreateGuest;
